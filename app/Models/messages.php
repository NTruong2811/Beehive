<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class messages extends Model
{
    use HasFactory;
    protected $table = 'messages';

    protected $fillable = [
        'UserId',
        'RoomId',
        'message',
        'type'
    ];
    public function user()
    {
        return $this->belongsTo(users::class,'UserId','id');
    }
    public function room(){
        return $this->belongsTo(rooms::class,'RoomId','id');
    }
}
