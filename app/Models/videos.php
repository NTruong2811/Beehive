<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $fillable = [
        'post_id',
        'file'
    ];
    public function posts()
    {
        return $this->belongsTo(posts::class);
    }
}
