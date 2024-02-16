<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function pagenotfound(){
		 
        return view('error404');
		
	}
	 
}
 
