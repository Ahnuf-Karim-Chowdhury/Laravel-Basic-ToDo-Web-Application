<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory; /* It lets you quickly create sample Note objects with preset data, which is helpful for testing and adding initial data to your database */

    protected $fillable = [
        'note',
        'user_id',
    ];
}
