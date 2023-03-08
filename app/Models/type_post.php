<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_post extends Model
{
    use HasFactory;
    protected $table = 'type_post';
    public function post()
    {
        return $this->hasMany(posts::class);
    }
}
