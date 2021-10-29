<?php

namespace App\Http\Controllers\api_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\GoldOnEmiSchemeRepository;

class GoldOnEmiScehemeController extends Controller
{
    private $gold_on_emi_repo;
    private $filter;
    public function __construct()
    {
        $this->filter();
        $this->gold_on_emi_repo = new GoldOnEmiSchemeRepository();
    }

    public function fetch()
    {
        $gold_on_emi_dataset = $this->gold_on_emi_repo->fetch(filter: $this->filter);
        return response()->json($gold_on_emi_dataset, 200);
    }
    
    //-------------------------------------------PRIVATE FUNCTIONS
    private function filter()
    {
        $this->filter = [
            'id' => request()->id,
            'scheme_name' => request()->scheme_name,
            'period' => request()->period,
            'cycle' => request()->cycle,
        ];
    }
}
