<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    use HasFactory;

    protected $fillable = [
        'disability',
        'doh',
        'hipaa_state',
        'hipaa',
        'joinder',
        'map',
        'home',
        'mltc',
        'source',
        'tform',
    ];

}
