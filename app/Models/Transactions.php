<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
     'userid',
     'hotelid',
     'roomid',
     'promoid',
     'amount',
     'numberofdays',
     'ban_amount',
     'start_date',
     'end_date',
     'status',
     'referenceid',
    ];

    }
