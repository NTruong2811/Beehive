<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        'post_id',
        'files'
    ];
    public function posts()
    {
        return $this->belongsTo(posts::class);
    }
}
