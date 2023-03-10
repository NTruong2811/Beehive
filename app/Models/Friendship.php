<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    use HasFactory;
    protected $table = 'friendship';
    protected $fillable = [
        'RequesterId',
        'AddresseeId',
        'status',
    ];
}
