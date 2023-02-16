<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beehive_notification extends Model
{
    use HasFactory;
    protected $table = 'beehive_notification';

    protected $fillable = [
        'message',
        'ByUser',
        'ToUser',
        'TypeNotifi',
        'status',
        'url'
    ];
}
