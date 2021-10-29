<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\UUIDTrait;

class AdminModel extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use UUIDTrait, HasFactory, SoftDeletes;

    protected $table = "admin";
    // protected $fillable = [
    //    'email_address',
    //     'password'
    // ];

      
    


  
}
