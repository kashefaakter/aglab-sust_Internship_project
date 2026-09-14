<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    protected $fillable = [
        'title',
        'description',
        'output_type',
        'year',
        'image',
        'external_url',
        'status',
    ];
}