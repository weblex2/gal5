<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiDataController extends Controller
{
    public function index(){
        return "Hallo API";
    }
}
