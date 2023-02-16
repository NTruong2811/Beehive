<?php

namespace App\Http\Controllers;

use App\Models\beehive_notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function GetTypeNotifi()
    {
        return DB::table('type_notification')->get();
    }
    public function AddFriend(Request $request)
    {
        try {
            return beehive_notification::create($request->all());
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function CheckNotifiUnread(Request $request)
    {
        $type_notifi = DB::table('type_notification')->get();
        $notification = [];
        foreach ($type_notifi as $item) {
            $type_notifi_data = beehive_notification::where([
                'ToUser' => $request->id,
                'TypeNotifi' => $item->id,
                'status' => 0
            ])->get();
            array_push($notification, (object) ['name' => $item->name, 'data' => $type_notifi_data]);
        }
        return $notification;
    }
}
