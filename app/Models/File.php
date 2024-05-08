<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'police_id',
        'filename', 
        'complete_filename',
        'folder'
    ];
}
