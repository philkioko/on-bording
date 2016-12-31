<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Organization extends Model
{
    public function  OrganizationUser(){
        return $this->hasMany('App\User');
    }
}
