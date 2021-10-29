<?php

namespace App\Http\Controllers\api_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\UserGoldOnEmiSchemeRepository;
use App\Repository\GoldOnEmiSchemeRepository;

class UserGoldOnEmiScehemeController extends Controller
{
    private $user_gold_on_emi_repo;
    private $gold_on_emi_repo;
    private $filter;
    public function __construct()
    {
        $this->filter();
        $this->user_gold_on_emi_repo = new UserGoldOnEmiSchemeRepository();
        $this->gold_on_emi_repo = new GoldOnEmiSchemeRepository();
    }

    public function fetch()
    {
        $user_gold_on_emi_dataset = $this->user_gold_on_emi_repo->fetch(filter: $this->filter);
        return response()->json($user_gold_on_emi_dataset, 200);
    }

    public function save(Request $request)
    {
        $this->filter = ['id' => $request->scheme_id];
        $gold_on_emi_scheme_dataset = $this->gold_on_emi_repo->fetch(filter: $this->filter);
        foreach ($gold_on_emi_scheme_dataset as $key => $value) {
            $this->gold_on_emi_repo->add($request);
        }
        return response()->json($request, 201);
    }

    //-------------------------------------------PRIVATE FUNCTIONS
    private function filter()
    {
        $this->filter = [
            'id' => request()->id,
            'user_id' => request()->user_id,
            'scheme_name' => request()->scheme_name,
            'period' => request()->period,
            'cycle' => request()->cycle,
            'gold_rate' => request()->gold_rate,
        ];
    }
}
