<?php

namespace App\Http\Controllers\api_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SettingGoldRateRequest;

use App\Repository\SettingGoldRateRepository;

class SettingGoldRateController extends Controller
{
    private $setting_gold_rate_repo;

    public function __construct()
    {
        $this->setting_gold_rate_repo = new SettingGoldRateRepository();
    }

    public function get_gold_rate()
    {
        $setting_gold_rate_dataset = $this->setting_gold_rate_repo->fetch();
        return response()->json($setting_gold_rate_dataset, 200);
    }

    //-------------------------------------------CREATE
    public function save_gold_rate(SettingGoldRateRequest $request)
    {
        if($this->setting_gold_rate_repo->add($request)){
            return response()->json(['status'=>'success', 'data'=>$request], 201);
        }
        return response()->json(['status'=>'fail', 'message'=>"Something Went Wrong.!"], 500);            
    }
}
