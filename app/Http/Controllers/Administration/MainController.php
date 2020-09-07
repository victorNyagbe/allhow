<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard(){
        
        return view('administrations.dashboard');
    }
}
