@extends('layout.master')
@section('content')
<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading">Login </h2>
            </div>
        </div>
    </div>
    </div>
<div class="container">
	<div class="col-sm-6 col-md-8 col-lg-5">
		<div class="row">
           
					<div class="panel-body">
					  <div class="row panel panel-default padding_div"> 
                     		
					  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				        <p class="postDescription">JSWEBSOLUTIONS is a Programming &amp; Web Development Tutorials and Blog  . JSWEBSOLUTIONS  Provide  Free Programming &amp; Web development tutorials  . In this Blog We Provide Best and Useful code to for your project  . So that you use this code free and make a better and creative project .  </p>
				        <p class="postDescription">
				          JSWEBSOLUTIONS provide freelance work for php project .
				        </p>
                         
					   <div>
                       </div>
			          </div>
                      </div>
                    </div>
			
		</div>
		
	</div>
	<div class="col-sm-6 col-md-4 col-lg-7 panel-body">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3 class="titleList text-center">Welcome Back</h3>
				<!-- <p class="text-muted postDate">Subscribe to our weekly Newsletter and stay tuned.</p> -->
                 @if(Session::has('msg'))
                  {!!  Session::get("msg") !!}
                 @endif
                <div class="padding_40">
				<div class="col-md-8 login-form-1">
                    <form action="<?php echo url('login'); ?>" method="POST">
                    @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Login with your registered email  *" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *"  name="password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember_me" value="1" />&nbsp;Remember Me
                        </div> 
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Sign In &nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i></button>
                            &nbsp;
                            <a href="<?php echo url('register') ?>" class="btn btn-default">Create Your Account &nbsp;<i class="fa fa-user-plus" aria-hidden="true"></i></a>
                        </div>
                        
                       <!-- <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>-->
                    </form>
                </div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop