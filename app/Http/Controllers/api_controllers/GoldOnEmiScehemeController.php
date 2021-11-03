<?php

namespace App\Http\Controllers\api_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\GoldOnEmiSchemeRepository;

class GoldOnEmiScehemeController extends Controller
{
    private $gold_on_emi_repo;

    public function __construct()
    {
        $this->gold_on_emi_repo = new GoldOnEmiSchemeRepository();
    }

    public function fetch()
    {
        $gold_on_emi_dataset = $this->gold_on_emi_repo->fetch(filter: $this->filter);
        return response()->json($gold_on_emi_dataset, 200);
    }
}
