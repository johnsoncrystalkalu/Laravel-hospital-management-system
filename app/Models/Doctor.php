<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    // use HasFactory;

    protected $fillable = [
        'doctors_name',
        // add other fields here when you add more form inputs
    ];
}
