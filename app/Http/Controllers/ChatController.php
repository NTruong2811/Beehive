<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\messages;
use App\Models\participants;
use App\Models\rooms;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function GetChatDetail(Request $request)
    {
        // return $request->all();
        // return participants::all();

        


        // $UserChatList = participants::select('RoomId',participants::raw('COUNT(*) as count'))
        // ->whereIn('UserId',[auth()->id(),$request->id])
        // ->groupBy('RoomId')
        // ->get();
        // return $UserChatList;
         
        try {
            $GetRoomId = participants::join('rooms', 'rooms.id', '=', 'participants.RoomId')
            ->where('UserId', '=', $request->id)
            ->where('type', '=', 0)
            ->whereIn('RoomId', function($query){
                $query->select('RoomId')
                ->from('participants')
                ->where('UserId', '=', auth()->id())
                ->get();
            })
            ->first();
            
            if ($GetRoomId) {
                $GetDetail = rooms::with('message','message.user')->where('id','=',$GetRoomId['RoomId'])->first();
                return $GetDetail;
            }
            else{
                return '';
            }
            
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function SendMessage(Request $request)
    {   
        $DataRequest =  $request->all();
        if (!$request->RoomId) { // không chứa id người dùng chưa từng chat tiến hành tạo room
            $newRoom = rooms::create(['type'=>0]);
            participants::insert([
                [
                    'UserId'=>auth()->id(),
                    'RoomId'=>$newRoom->id,
                ],
                [
                    'UserId'=>$DataRequest['ToUser'],
                    'RoomId'=>$newRoom->id,
                ]
             ]
            );
            $DataRequest['RoomId'] = $newRoom->id;
        }

        $NewMessage = messages::create($DataRequest);
        $NewMessage->load('user'); 
        $NewMessage->ToUser = $request->ToUser;
        $data = [
            'data'=> $NewMessage
        ];
        ChatEvent::dispatch( Request::create('','POST',$data));
        
        return $NewMessage;
    }
}
