@extends('layout.master')
@section('content')
<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="banner_heading"> About Us </h1>
            </div>
        </div>
    </div>
    </div>
<div class="container">
	<div class="col-sm-6 col-md-8 col-lg-8">
		<div class="row">
           <div class="">
					<div class="panel-body">
					  <div class="row panel panel-default padding_div"> 
					  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				        <p class="post_description">Hello friends ,  I am Jitendra sahu . I am a professional  web developer and 
                        Owner of <a href="https://jswebsolutions.in/">JSWEBSOLUTIONS</a> . I have 3 year experience in web development and my key skill is HTML , CSS , JAVASCRIPT , PHP , SQL , MYSQL , PDO , Codeignitor  , Laravel  , JSON . I am also working on REST and SOAP  web services . I have 2 year experiance on laravel development . The main purpose of this website i want share my knowledge to from every one .  JSWEBSOLUTIONS is a  Programming &amp; Web Development Tutorials snippet website  and Blog . JSWEBSOLUTIONS  Provide  Free / Paid  Programming &amp; Web development tutorials snippet . In this website We Provide Best and Useful code to our visitors  . So that you use this code free and make a better and creative project . </p>
				        <p class="post_description"> I have a professional team to  provide variuous of service like below :
                           
				           You can hire me as a personal developer . you can hire we for more services like below at affordable price .
				        </p>
				        <ul class="post_description">
				            <li>Html template design </li>
                            <li>Frontend development  </li>
                            <li>Angular Frontend  developemnt   </li>
                            <li>PHP Development </li>
                            <li>Codeignitor Project Development </li>
                            <li>Laravel Project Development </li>
                            <li>REST Api Development </li>
                            <li>SOAP Api Development </li>
                            <li>App development </li>
                            <li>SEO ,SMO , Digital Marketing </li>
                            <li>Content Writing </li>
                            <li>Web Hosting </li>
                            <li>Linux Server Setup</li>
				        </ul
				       
                       </div>
                        <a target="_blank" type="button" class="btn btn-default" href="https://jswebsolutions.in/contact_us" style="margin-top:10px;">Hire me</a>
			          </div>
                      </div>
                    </div>
				</div>
		</div>
		
	</div>
	<div class="col-sm-6 col-md-4 col-lg-4 panel-body">
		@include('front.component.newsletter')
        @include('front.component.php_function')
	</div>
</div>
</div>
@stop