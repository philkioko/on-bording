<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use Mail;

class RegistrationController extends Controller
{
    public function register(Request $request){
    	$validator = Validator::make($request->all(), [
            'fullnames'          =>'required',
            'password'           => 'required',
            'phonenumber'        => 'required',
            'email'              => 'required|email',
        ]);
        if ($validator->fails()) {
             return $validator->errors()->all();
        
        }else{
        	$user=Sentinel::register($request->all());
	    	$Activation=Activation::create($user);
	    	$this->sendEmail($user,$Activation->code);
	    	return redirect('/backend')->with(['success'=>"user has been registered to the system successfull"]);

        }
    }
    private function sendEmail($user, $code){
    	Mail::send('emails.activation',[
    		'user' =>$user,
    		'code' =>$code
    		],function($message) use ($user){
    			$message->to($user->email);
    			$message ->subject("Hello $user->fullnames, activate your account");
    	});
    }
}
