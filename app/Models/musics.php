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
        'image_file',
        'song_file',
        'song_name',
        'song_artist',
    ];
    public function posts()
    {
        return $this->belongsTo(posts::class);
    }
}
