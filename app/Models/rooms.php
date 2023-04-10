<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;
    protected $fillable = [
        'type'
    ];
    public function message(){
        return $this->hasMany(messages::class,'RoomId','id');
    }
}
