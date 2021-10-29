<?php

namespace App\Http\Controllers\api_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\SettingGoldRateRepository;

class SettingGoldRateController extends Controller
{
    private $setting_gold_rate_repo;
    private $filter;
    public function __construct()
    {
        $this->filter();
        $this->setting_gold_rate_repo = new SettingGoldRateRepository();
    }

    public function get_gold_rate()
    {
        $setting_gold_rate_dataset = $this->setting_gold_rate_repo->fetch(filter: $this->filter);
        return response()->json($setting_gold_rate_dataset, 200);
    }

    //-------------------------------------------CREATE
    public function save_gold_rate(Request $request)
    {
        //TODO : GET GOLD DATA FROM AUGMOUNT OR OTHER GOLD RATE API
        $request->validate([
            'gold_melting_name' => 'required',
            'gold_melting_buy_rate' => 'required',
            'gold_melting_sale_rate' => 'required',
        ]);
        //Insert in DB
        if($this->setting_gold_rate_repo->add($request)){
            return response()->json(['status'=>'success', 'data'=>$request], 201);
        }
        return response()->json(['status'=>'fail', 'message'=>"Something Went Wrong.!"], 500);            
    }
    
    //-------------------------------------------PRIVATE FUNCTIONS
    private function filter()
    {
        $this->filter = [
            'id' => request()->id,
            'gold_melting_name' => request()->gold_melting_name,
            'gold_melting_buy_rate' => request()->gold_melting_buy_rate,
            'gold_melting_sale_rate' => request()->gold_melting_sale_rate,
        ];
    }
}
