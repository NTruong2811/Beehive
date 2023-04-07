<?php

namespace App\Http\Controllers;

use App\Events\AddFriendEvent;
use App\Events\BeehiveCallAnswer;
use App\Events\BeehiveCallOffer;
use App\Models\Friendship;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function GetUserProfile(Request $request)
    {
        $id = $request->id;

        if ($id != auth()->id()) {

            $user = users::with('CheckFriendAddressee', 'CheckFriendRequester')
                ->where('users.id', '=', $id)
                ->first();

            // $user = users::join('friendship', function($join) use ($id) {
            //     $join->on('users.id', '=', 'friendship.RequesterId')
            //          ->orOn('users.id', '=', 'friendship.AddresseeId');
            //         //  ->where(function($query) use ($id) {
            //         //      $query->where('friendship.RequesterId', '=', $id)
            //         //            ->orWhere('friendship.AddresseeId', '=', $id);
            //         //  });
            // })
            // // ->whereIn('friendship.RequesterId', [$id])
            // //            ->orWhereIn('friendship.AddresseeId', [$id])
            // ->where('users.id','=',$id)
            // ->first();

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
