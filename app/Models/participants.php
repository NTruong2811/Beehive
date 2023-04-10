<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participants extends Model
{
    use HasFactory;
    protected $table = 'participants';

    protected $fillable = [
        'UserId',
        'RoomId',
    ];
    public function user()
    {
        return $this->belongsTo('users','UserId','id');
    }
    public function room(){
        return $this->belongsTo('rooms','RoomId','id');
    }}
