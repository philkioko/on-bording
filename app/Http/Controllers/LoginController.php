<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function Login(Request $request){
  	
  		try{
  			Sentinel::authenticate($request->all());
	    	if (Sentinel::check()){
	    		return redirect('/backend');
	    	}else{

	    		return redirect()->back()->with(
	    			[
	    			'errors' => 'Wrong credentials,use correct ones please'
	    			]);
	    	}
  		}catch(ThrottlingException $e){
  			$delay=$e->getDelay();
  			return redirect()->back()->with(
	    			[
	    			'errors' => "You have been banned for $delay seconds from accessing your account"
	    		    ]);
  		}catch(NotActivatedException $e){
        return redirect()->back()->with(
            [
            'errors' => "Your Account is not yet activated please"
              ]);
      }
    }

    public function Logout(){
      Sentinel::logout();
      return redirect('/');
    }
}
