<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replies extends Model
{
    use HasFactory;
    protected $table = 'replies';
    protected $fillable = [
        'comment_id',
        'user_id',
        'like',
        'content'
    ];
    public function comment()
    {
        return $this->belongsTo(comments::class, 'comment_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(users::class, 'user_id', 'id');
    }
}
