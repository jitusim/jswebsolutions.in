<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(Request $request){
        $request->validate([
            'email' =>'required','password'=>'required'
           ]);
       $user_details = \App\User::where([['email','=' , $request->email]])->first();
       if($user_details != NULL){
           if($request->password == $user_details->password) {
        //if(Hash::check($request->password , $user_details->password)) {
               $remember = $request->remember_me;
                Auth::login($user_details , $remember);
                return redirect('js_admin/dashboard')->with(['msg'=>'<div class="notice notice-success"><strong> Success , </strong> Login Successful  !!! . </div>']);    
             }
           else{
              return redirect()->back()->with(['msg'=>'<div class="notice notice-danger"><strong> Wrong , </strong> Password does not matched !!! . </div>']); 
             }  
         }
       else{
            return redirect()->back()->with(['msg'=>'<div class="notice notice-danger"><strong> Wrong , </strong> User does not exists with this crediantial !!! . </div>']);
         }  	
    }
 

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //$this->middleware('guest')->except('logout');
    // }
}
