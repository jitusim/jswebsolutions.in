<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class Logincontroller extends Controller {

   
	
	public function adminLogin(){
		if(Auth::check()){
			if(Auth::user()->roll_type == 1){
			  return redirect('js_admin/dashboard');
			}
		}
		$data['head_title'] = ucfirst('jswebsolution Admin login');
		return view('jsWebsolutionsAdminLogin',$data);
	 }
    
	public function logout(){
	   Auth::logout();
	   return redirect('/');
	}
	
}
