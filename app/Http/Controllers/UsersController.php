<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function ManageUsers(){
    	$users=User::all();
    	return view('backend.systemusers.manageusers',compact('user','users'));
    }
}
