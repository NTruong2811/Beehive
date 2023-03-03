<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\messages;
use App\Models\participants;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function GetChatDetail(Request $request)
    {
        // return $request->all();
        $UserChatList = participants::select('RoomId')->where('UserId', '=', auth()->id())->get();
        $GetRoomId = participants::join('rooms', 'rooms.id', '=', 'participants.RoomId')
            ->where('UserId', '=', $request->id)
            ->where('type', '=', 1)
            ->whereIn('RoomId', $UserChatList)
            ->first();
        $GetDetail = messages::where('RoomId', '=', $GetRoomId['RoomId'])->get();
        return $GetDetail;
    }
    public function SendMessage(Request $request)
    {
        $NewMessage = messages::create($request->all());
        $request = [
            'message'=> $request->message,
            'FromUser'=> $request->UserId,
            'ToUser' => $request->ToUser,
            'Time'=> $NewMessage->created_at
        ];
        $EventRequest = Request::create('','POST',$request);
        ChatEvent::dispatch($EventRequest);
        return $EventRequest;
    }
}
