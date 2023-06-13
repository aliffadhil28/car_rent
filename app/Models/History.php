<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'cars_id',
        'accessor1',
        'accessor2',
        'out',
        'in',
    ];
}
