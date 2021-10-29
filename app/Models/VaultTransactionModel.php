<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Traits
use App\Traits\UUIDTrait;

class VaultTransactionModel extends Model
{
    use UUIDTrait, HasFactory, SoftDeletes;
    
    protected $table = "vault_transaction";
    protected $fillable = ['user_id', 'weight', 'gold_melting_type', 'gold_rate', 'purchase_date'];
}
