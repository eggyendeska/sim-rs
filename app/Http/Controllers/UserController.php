<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
use \Crypt;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');			//for administrator
       // $this->middleware('auth'); 		//for operator
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::all();
        return view('user/index')
					->with('title','Data User')
					->with('users',$users);
    }
	
	public function destroy($id){
		try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return "error";
		}
		$users = User::find($id);
		if($users->delete()){
			echo 1;
		}else{
			echo 0;
		}
		
	}
	
}
