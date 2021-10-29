<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Traits
use App\Traits\UUIDTrait;

class SettingGoldRateModel extends Model
{
    use UUIDTrait, HasFactory, SoftDeletes;
    
    protected $table = "setting_gold_rate";
    protected $fillable = ['gold_melting_name', 'gold_melting_buy_rate', 'gold_melting_sale_rate'];

}
