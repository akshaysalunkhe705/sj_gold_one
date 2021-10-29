<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Traits
use App\Traits\UUIDTrait;

class PaymentModel extends Model
{
    use UUIDTrait, HasFactory, SoftDeletes;
    
    protected $table = "payments";
    protected $fillable = ['user_id', 'payment_gateway', 'payment_status', 'payment_mode', 'transaction_type'];
}
