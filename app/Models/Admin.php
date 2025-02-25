<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;  // Import đúng trait HasApiTokens
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    protected $fillable = ['admin_name', 'email','password'];
}




