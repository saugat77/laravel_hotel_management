<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomTypeImage;

class RoomType extends Model
{
    use HasFactory;
    protected $table = 'room_types';
    // function roomtype(){
    //     return $this->hasMany(RoomTypeImage::class,'room_Type_id');
    // }
}
