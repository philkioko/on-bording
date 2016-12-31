<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Sentinel;
use Activation;
use Mail;
use App\Organization;
use Validator;
use PDOException;

class OrganizationController extends Controller
{
    public function CreateOrganizations(){
    	return view('backend.organizations.organizations');
    }

    public function NewOrganizations(Request $request){

     $Adminid=Sentinel::getUser()->id;

     $validator = Validator::make($request->all(), [
            'organization_name'  =>'required',
            'address'            => 'required',
            'phonenumber'        => 'required',
            'email'              => 'required|email',
            'officephonenumbers' =>'required'
        ]);
        if ($validator->fails()) {
         return $validator->errors()->all();
        
        }else{
           try{
		        $organization=new Organization;
		        $organization->user_id             =$Adminid;
		        $organization->organization_name   = $request->organization_name;
		        $organization->address       	   = $request->address;
		        $organization->phonenumber 		   = $request->phonenumber;
		        $organization->email               = $request->email;
		        $organization->officephonenumbers = join(", ",$request->officephonenumbers);
		        $organization->save();
        
	        if ($organization) {
	        	return redirect('/CreateOrganization')->with([
	        	  'organizationsuccess'=>"Organization has been created successfull"
	        	  ]);
	        }else{
	        	return redirect('/CreateOrganization')->with([
	        	 'organizationerror'=>"Organization has not been created successfull"
	        	 ]);
	        }
          }catch(PDOException $e){
          	    return redirect('/CreateOrganization')->with([
          	    'organizationexist'=>"Organization already exists in the system"
          	     ]);
          }
        }
    }

    public function manageOrganizations(){
    	$admiId       =Sentinel::getUser()->id;
    	$organization =User::find($admiId)->getOrganizationByUser;
       return view('backend.organizations.manage_organizations',compact('organization','organization')); 
    }

    public function CreateUserOrg(Request $request){
    	$validator = Validator::make($request->all(), [
            'organization_id'      =>'required',
            'fullnames'            => 'required',
            'title'                => 'required',
            'phonenumber'          => 'required',
            'email'                =>'required|email',
            'password'             =>'required'
        ]);
        if ($validator->fails()) {
         return $validator->errors()->all();
        
        }else{
        	try{
	          	$user=Sentinel::register($request->all());
	          	$Activation=Activation::create($user);
		    	$this->sendEmail($user,$Activation->code);
		    	$user = Sentinel::findById($user->id);
		  $role = Sentinel::findRoleByName("Super administrator");
		  $role->users()->attach($user);
	        if ($Activation) {
	        	return redirect('/manageOrganization');
	        }else{
	        	return redirect('/manageOrganization');
	        }
          }catch(PDOException $e){
          	   return redirect('/manageOrganization');
          }
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

    public function VieworganizationUsers($id){
   		 $organization =Organization::find($id)->OrganizationUser;
		 return view('backend.organizations.organizationUsers',compact('organization'));
    }
}
