<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function Backend(){
    	return view('backend.backend_template');
    }
}
