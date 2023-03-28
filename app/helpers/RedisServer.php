<?php

namespace App\helpers;

use Illuminate\Support\Facades\Redis;

class RedisServer
{

    public $redis;

    public function __construct()
    {
        $this->redis = new Redis();
    }
    public function SetListData($NameData, $data)
    {
        $List = [];
        foreach ($data->items() as $item) {
            $List[$NameData . ':' . $item->id] = json_encode($item);
        }
        $redis = Redis::connection();
        $redis->mset($List);
    }

    public function SetNew($NameData, $data)
    {
        return $this->redis::set($NameData, $data);
    }
    public function GetData($NameData)
    {
        return  $this->redis::get($NameData);
    }
    public function DataExist($NameData)
    {
        $result = $this->redis::exists($NameData);
        if ($result) {
            $data = $this->redis::get($NameData);
            return json_decode($data);
        } else {
            return 0;
        }
    }
    public function DataFillter($key)
    {
        $result = $this->redis::keys($key);
        return $result;
    }
    public function GetAllData()
    {
        return Redis::keys('*');
    }
}