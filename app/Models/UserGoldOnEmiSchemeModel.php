<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Traits
use App\Traits\UUIDTrait;

class UserGoldOnEmiSchemeModel extends Model
{
    use UUIDTrait, HasFactory, SoftDeletes;
    
    protected $table = "user_gold_on_emi_scheme";
    protected $fillable = ['user_id', 'scheme_name', 'period', 'cycle', 'gold_melting_type', 'gold_rate'];
}
