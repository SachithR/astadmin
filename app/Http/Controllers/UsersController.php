<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
		
		//$users = DB::table('user_master')->get();
		
        $livestatus = DB::table('live_status')->get();
         
		$id=session()->get('usertypeid');
		if($id!="" || $id!=null){
			$user_type  = DB::table('user_type_list') 
			->where('id',$id)
			->first();
			$user_types  = DB::table('user_type_list') 
			->where('title','ADMIN')
			->first();
			
			if($user_type->title=="ADMIN"){
				$users = DB::table('user_master')
				->join('user_type_list', 'user_type_id', '=', 'user_type_list.id')
				->select('user_master.*', 'user_type_list.title as usertitile')
				->get();
			}else{
				$users = DB::table('user_master')
				->join('user_type_list', 'user_type_id', '=', 'user_type_list.id')
				->where('user_type_id','!=',$user_types->id)
				->select('user_master.*', 'user_type_list.title as usertitile')
				->get();
			}
			$privilagetypes  = DB::table('user_privilege')
				->join('section', 'section_id', '=', 'section.id')
				->select('user_privilege.*')
				 ->where([
						['user_privilege.user_type_id', '=', $id],
						['section.form_name', '=', 'users']])
				->first();
				
				 if($privilagetypes!=""){	
					 if($privilagetypes->view==1){
						  return view('users',compact('users','privilagetypes','livestatus' ));
					 }else{
						 return view('permissiondenide');
					 }	
				 }else{
					if($id!="" || $id!=null){
						return view('permissiondenide');
					}else{
						return view('login');
					}
					 
				 }	
			}
		 
	}

	

	
	public function loginuser(){
		return view('login');
	}
	
	public function checkuser(){
		$username = $_GET['usernames'];
		$password = $_GET['password'];
		
		$user  = DB::table('user_master') 
        ->where('username',$username)
        ->first();
        $pass="incorrect";
        if($password== $user->password){
			session()->put('usertypeid',$user->user_type_id);
			session()->put('userid',$user->id);
			session()->put('username',$username);
			
			$pass="correct";
			 
		}else{
			$pass="incorrect";
		}
		
		return $pass;
            
	}
	
	public function notpermission(){
		return view('permissiondenide');
    }
    
    public function sessionhasexpire(){
		return view('sessionexpire');
	}
    public function logoutuser(){
		if(session()->has('usertypeid')){
			session()->forget('usertypeid');
			session()->forget('userid');
			session()->forget('username');
		}
		return view('login');
		 
	}

	public function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

	
}
 
