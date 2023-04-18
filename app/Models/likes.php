<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = [
        'post_id',
        'user_id'
    ];
    
    public function post()
    {
        return $this->hasOne(posts::class,'post_id','id');
    }
    public function user(){
        return $this->hasOne(user::class,'user_id','id');
    }




}
