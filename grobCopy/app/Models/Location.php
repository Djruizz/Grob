<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street',
        'neighborhood',
        'postal_code',
        'city',
        'state',
        'phone',
        'email_1',
        'email_2',
        'lat',
        'lng',
        'map_url',
    ];
}
