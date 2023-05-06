<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Dosen extends Authenticatable
{
    use HasFactory, HasApiTokens, HasRoles;

    protected $guarded = [
        'id',
    ];
}
