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

class UserModel extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use UUIDTrait, HasFactory, SoftDeletes;

    protected $table = "users";
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'password',
        'primary_phone_number',
        'secondary_phone_number',
        'state',
        'city',
        'area',
        'address',
        'pincode',
        'gold_in_vault',
        'ip_address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function logout($request)
    {
        //auth()->user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();
    }

    public function fetch_all($per_page = 0)
    {
        if ($per_page != 0) {
            return $this->paginate($per_page);
        }
        return $this->all();
    }
}
