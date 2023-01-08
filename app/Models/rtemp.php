<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rtemp extends Model
{
    use HasFactory;

    protected $fillable = [
        'promoid',
        'hotelid',
        'roomid',
        'userid',
        'referenceId',
        'amount',
        'status',
       ];
}


