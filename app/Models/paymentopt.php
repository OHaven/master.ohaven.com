<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentopt extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotelid',
        'qr',
        'altdets',
        'stat',
    ];
}
