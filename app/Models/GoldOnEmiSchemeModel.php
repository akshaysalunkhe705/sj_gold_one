<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Traits
use App\Traits\UUIDTrait;

class GoldOnEmiSchemeModel extends Model
{
    use UUIDTrait, HasFactory, SoftDeletes;

    protected $table = "gold_on_emi_scheme";
    protected $fillable = ['scheme_name', 'initial_amount_percent', 'interest_rate', 'period', 'cycle'];
}
