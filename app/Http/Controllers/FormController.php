<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function formdaftar()
    {
        return view ('page.daftar');
        
    }
      public function welcome(Request $request )
    {
        $firstname = $request->input("firstname");
        $lastname = $request->input("lastname");
        
        return view ('page.home', ["firstname" => $firstname, 'lastname'=>$lastname]);
    }
}