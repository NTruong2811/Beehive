<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class musics extends Model
{
    use HasFactory;
    protected $table = 'musics';
    protected $fillable = [
        'post_id',
        'image',
        'song_name',
        'song_artist',
        'src'
    ];
    public function posts()
    {
        return $this->belongsTo(posts::class);
    }
}
