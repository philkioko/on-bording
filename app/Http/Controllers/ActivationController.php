<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activation;
use Sentinel;
use App\User;

class ActivationController extends Controller
{
    public function activate($email,$activationCode){

    	$user=User::whereEmail($email)->first();
    	$Sentinel=Sentinel::findById($user->id);
    	if (Activation::complete($Sentinel,$activationCode)) {
   			return redirect('/');

    	}else{

    	}
    }
}
