<?php

namespace App\Http\Controllers\api_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\SettingGoldRateRepository;
use App\Repository\UserGoldOnEmiSchemeRepository;
use App\Repository\GoldOnEmiSchemeRepository;

class UserGoldOnEmiScehemeController extends Controller
{
    private $user_gold_on_emi_repo;
    private $gold_on_emi_repo;
    
    public function __construct()
    {
        $this->setting_gold_rate_repo = new SettingGoldRateRepository();
        $this->user_gold_on_emi_repo = new UserGoldOnEmiSchemeRepository();
        $this->gold_on_emi_repo = new GoldOnEmiSchemeRepository();
    }

    public function get_user_gold_on_emi_scheme()
    {
        $user_gold_on_emi_dataset = $this->user_gold_on_emi_repo->fetch();
        return response()->json($user_gold_on_emi_dataset, 200);
    }

    public function save_user_gold_on_emi_scheme(Request $request)
    {
        //fetch gold rate details
        $setting_gold_rate_dataset = $this->setting_gold_rate_repo->fetch(filter: ['gold_melting_name' => $request->gold_melting_type]);
        
        //fetch gold on emi scheme
        $gold_on_emi_scheme_dataset = $this->gold_on_emi_repo->fetch(filter: ['id' => $request->scheme_id]);

        //add into user gold on emi
        //add interest in base price first
        //get initial amount
        //get interest amout
        //remove initial amount from first calculation and dvivide by the number of cycle

        $total_amount = $request->gold_weight * $setting_gold_rate_dataset->gold_melting_sale_rate;
        
        $user_gold_on_emi['user_id'] = 1; // TODO: Fetch user id from token
        $user_gold_on_emi['scheme_name'] = $gold_on_emi_scheme_dataset->scheme_name;
        $user_gold_on_emi['initial_amount_percent'] = $gold_on_emi_scheme_dataset->initial_amount_percent;
        $user_gold_on_emi['initial_amount'] = $total_amount/100*$gold_on_emi_scheme_dataset->initial_amount_percent;
        $user_gold_on_emi['interest_rate'] = $gold_on_emi_scheme_dataset->interest_rate;
        $user_gold_on_emi['interest_amount'] = $total_amount/100*$gold_on_emi_scheme_dataset->interest_rate;
        $user_gold_on_emi['emi_amount'] = 1;
        $user_gold_on_emi['period'] = $gold_on_emi_scheme_dataset->period;
        $user_gold_on_emi['cycle'] = $gold_on_emi_scheme_dataset->cycle;
        $user_gold_on_emi['gold_melting_type'] = $setting_gold_rate_dataset->gold_melting_type;
        $user_gold_on_emi['gold_rate'] = $setting_gold_rate_dataset->gold_rate;
        $user_gold_on_emi['gold_weight'] = $request->gold_weight;
        $user_gold_on_emi['emi_on_date'] = $request->emi_on_date;
        return $user_gold_on_emi;

        //create list of payments
        // $payments = [];
        // for ($i=0; $i < $gold_on_emi_scheme_dataset[0]->cycle; $i++) {
        //     $payments[''] =
        // }
        // return response()->json($request, 201);
    }
}
