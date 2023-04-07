<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'email',
        'name',
        'birthday', 
        'avatar',
        'gender',
        'password'
    ];

    public function post()
    {
        return $this->hasMany(posts::class);
    }
    public function comment(){
        return $this->hasMany(comments::class,'user_id');
    }
    // kiểm tra xem người dùng này có gửi lời mời kết bạn với user hay không
    public function CheckFriendRequester(){
        return $this->hasMany(Friendship::class,'RequesterId')
        ->where('AddresseeId', auth()->id());
    }

       // kiểm tra user đã gửi lời mời tới người này chưa 
       public function CheckFriendAddressee(){
        return $this->hasMany(Friendship::class,'AddresseeId')
        ->where('RequesterId', auth()->id());
    }
}
