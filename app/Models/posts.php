<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'id',
        'user_id',
        'type_postId',
        'description'
    ];


    public function user()
    {
        return $this->belongsTo(users::class, 'user_id', 'id');
    }
    public function type_post()
    {
        return $this->belongsTo(type_post::class, 'type_postId', 'id');
    }

    public function music()
    {
        return $this->hasOne(musics::class, 'post_id');
    }
    public function video()
    {
        return $this->hasOne(videos::class, 'post_id');
    }
    public function profile()
    {
        return $this->hasOne(profiles::class, 'post_id');
    }
    public function comments()
    {
        return $this->hasMany(comments::class, 'post_id');
    }
    
    public function Add($request){
        $post = posts::create([
            'user_id' => $request->user_id,
            'type_postId' => $request->type_postId,
            'description' => $request->description,
        ]);
        return $post;
    }



}
