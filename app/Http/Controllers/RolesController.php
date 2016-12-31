<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Sentinel;
use App\User;
use PDOException;

class RolesController extends Controller
{
    public function rolePage(){
    	 return view('backend.roles.role');
    }

    public function CreateRoles(Request $request){

    	$rolename=$request->slug;

    	if ($role = Sentinel::getRoleRepository()->createModel()->create([
		    'name' => $rolename,
		    'slug' => $rolename,
		])) {
    	  return redirect('/roles')->with(['success'=>"Role have been created successful"]);
    	}
    }

    public  function ManageRoles(){
    	$users=User::All();
    	return view('backend.roles.manageroles',compact('users'));
    }

    public function PostRole($id,$rolename){
    	try{
    	  $user = Sentinel::findById($id);
		  $role = Sentinel::findRoleByName($rolename);
		  $role->users()->attach($user);
		  if ($role) {
		  	return redirect()->back()->with(['rolesuccess'=>"Role has been asigned to the user successful"]);
		  }else{
		  	return redirect()->back()->with(['roleerror'=>"Role has not been asigned to the user successful"]);
		  }
    	}catch(PDOException $e){
    		return redirect()->back()->with(['roleexist'=>"Role has already been asigned to this user "]);
    	}
    }

    public function RemoveRole($id,$rolename){
    	  $user = Sentinel::findById($id);
		  $role = Sentinel::findRoleByName($rolename);
		  $role->users()->detach($user);
		  if ($role) {
		  	return redirect()->back()->with(['roleremovesuccess'=>"Role has been removed from this user successful"]);
		  }else{
		  	return redirect()->back()->with(['roleremoveerror'=>"Role has not been removed from this user successful"]);
		  }
    }
}
