<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rents extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'cars_id',
        'accessor1',
        'accessor2',
        'status1',
        'status2',
        'out',
        'in',
    ];
}
