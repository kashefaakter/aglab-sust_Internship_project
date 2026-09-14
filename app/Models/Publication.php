<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'title',
        'authors',
        'journal',
        'year',
        'publication_type',
        'status',
        'citation',
        'doi',
        'abstract',
        'publication_url',
        'pdf_file',
    ];
}