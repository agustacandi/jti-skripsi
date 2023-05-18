<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'is_published',
        'dosen_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
