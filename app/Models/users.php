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
}
