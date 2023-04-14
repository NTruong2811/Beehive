<?php

namespace App\Http\Controllers;

use App\Events\AddFriendEvent;
use App\Events\BeehiveCallAnswer;
use App\Events\BeehiveCallOffer;
use App\helpers\RedisServer;
use App\Models\Friendship;
use App\Models\posts;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public $RedisServer;
    public function __construct()
    {
        $this->RedisServer = new RedisServer;
    }

    public function GetUserProfile(Request $request)
    {
        $id = $request->id;

        if ($id != auth()->id()) {

            $user = users::with('CheckFriendAddressee', 'CheckFriendRequester')
                ->where('users.id', '=', $id)
                ->first();
        } else {
            $user = users::find($id);
        }
        return $user;
    }
    public function ListFriend(Request $request)
    {
        $userId = $request->id;
        $Friendship = Friendship::where('status', '=', 1)->where(
            function ($query) use ($request) {
                return $query
                    ->where('RequesterId', '=', $request->id)
                    ->orWhere('AddresseeId', '=', $request->id);
            }
        )->get();
        $list_friend = [];
        foreach ($Friendship as $item) {
            if ($item['AddresseeId'] != $userId) {
                $item['FriendInfor'] = users::find($item['AddresseeId']);
            }
            if ($item['RequesterId'] != $userId) {
                $item['FriendInfor'] = users::find($item['RequesterId']);
            }

            array_push($list_friend, $item);
        }
        return $list_friend;
    }
    public function NewFriend(Request $request)
    {
        $userId = $request->id;
        $Friendship = Friendship::where('status', '=', 0)->where(
            function ($query) use ($request) {
                return $query
                    ->where('RequesterId', '=', $request->id)
                    ->orWhere('AddresseeId', '=', $request->id);
            }
        )->get();
        $list_friend = [];
        foreach ($Friendship as $item) {
            if ($item['RequesterId'] != $userId) {
                $item['FriendInfor'] = users::find($item['RequesterId']);
                array_push($list_friend, $item);
            }
        }
        return $list_friend;
    }
    public function AddFriend(Request $request)
    {
        $check_friend = Friendship::where('RequesterId', $request['sendFrom'])->where('AddresseeId', $request['sendTo'])->get();
        if (count($check_friend) < 1) {
            $new_friend = Friendship::create([
                'RequesterId' => $request['sendFrom'],
                'AddresseeId' => $request['sendTo'],
                'status' => 0
            ]);
            $request['FromUser'] = Auth::user()->name;
            AddFriendEvent::dispatch($request);
            return response()->json([
                'message' => 'Sent the invitation success',
                'check_friend_addressee' => $new_friend,
                'status' => 0
            ], 200);
        } else {
            return response()->json([
                'message' => 'Api Block',
                'status' => 1
            ], 200);
        }
    }
    public function AcceptFriend(Request $request)
    {
        try {
            $FindRequest = Friendship::find($request->id);
            $FindRequest->status = 1;
            $FindRequest->update();

            return response()->json([
                'message' => 'Success',
                'status' => 0
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'status' => 1
            ], 200);
        }
    }
    public function CancelAddFriend(Request $request)
    {
        try {
            $FindRequest = Friendship::find($request->id);
            $FindRequest->delete();

            return response()->json([
                'message' => 'Success',
                'status' => 0
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'status' => 1
            ], 200);
        }
    }

    public function GetPostProfile(Request $request)
    {
        $data = posts::with('video', 'music', 'profile', 'user')
            ->orderBy('created_at', 'DESC')
            ->where('user_id', '=', $request->id)->paginate(5);
        if ($data->total() > 1) {
            $this->RedisServer->SetListData('post', $data);
        };
        return $data;
    }
    public function GetWatchsProfile(Request $request)
    {
        try {
            $data = posts::with('type_post', 'music', 'user', 'video')
                ->orderBy('created_at', 'DESC')
                ->whereIn('type_postId',[2,3])
                ->where('user_id','=',$request->id)
                ->paginate(5);

            return $data;
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function CallOffer(Request $request)
    {
        BeehiveCallOffer::dispatch($request);
    }
    public function CallAnswer(Request $request)
    {
        // return $request->all();
        BeehiveCallAnswer::dispatch($request);
    }
}
