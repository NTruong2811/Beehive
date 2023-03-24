<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'post_id',
        'user_id',
        'like',
        'content'
    ];
    public function post()
    {
        return $this->belongsTo(posts::class, 'post_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(users::class, 'user_id', 'id');
    }
    public function replies()
    {
        return $this->hasMany(replies::class, 'comment_id');
    }
}
