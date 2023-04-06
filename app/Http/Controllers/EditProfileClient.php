<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfileClient extends Controller
{
    public function profileClient($name){
//        echo 'the name is:'. $name .'<br />'.'the Id is: '. \request()->query->all()['id'];
        return view('editProfileClient');
    }
    public function editProfile():void
    {
        //
    }
}
