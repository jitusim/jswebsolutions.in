<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="msvalidate.01" content="61AE37E03BADD0CAABADD07D2628A786" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo url("public/frontWebu/assets/images/favicon.png"); ?>" />
    <title><?php if(!empty($head_title)) echo $head_title; ?> </title>
    <link rel="icon" type="image/png" href="<?php echo url("public/uploadsFiles/favicon_icon.png"); ?>">
    <meta property="og:url"           content="<?php if(!empty($pageUrl)) echo $pageUrl; ?>" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="<?php if(!empty($head_title)) echo $head_title; ?>" />
    <meta property="og:description"   content="<?php if(!empty($description)) echo $description; ?>" />
    <meta property="og:image"         content="<?php if(!empty($imageUrl)) echo $imageUrl; ?>" />
    <!--Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php if(!empty($description)) echo $description; ?>" />
    <meta name="twitter:title" content="<?php if(!empty($head_title)) echo $head_title; ?>" />
    <meta name="twitter:site" content="@jswebsolutions1" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:creator" content="@jswebsolutions1" />
    <!--End-->
    <meta name="description" content="<?php if(!empty($meta_description))echo $meta_description; ?>">
	<meta name="keywords" content="<?php if(!empty($meta_keyword))echo $meta_keyword; ?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
     <!--<link rel="stylesheet" href="js/font-awesome.css" type="text/css">-->
    <link rel="stylesheet" href="{{ asset('public/frontWebu/assets/css/bootstrap.min.css') }}">
    <link href="<?php echo url("public/frontWebu/assets/css/style.css"); ?>" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo url("public/frontWebu/assets/css/skin.css"); ?>" />
    <link rel="stylesheet" href="<?php echo asset("public/customjs/custom.css"); ?>" />
    <script data-ad-client="ca-pub-4152597108794624" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
 var url = "<?php echo url('/');  ?>";
 $.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
  });
</script>
</head>
<body onload="prettyPrint()">
<header class="fixed-top scroll-change" data-menu-anima="fade-in" style="z-index:1; position:relative;">
        <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
            <div class="navbar-mini scroll-hide">
                <div class="container-fluid">
                   <!--
                    <div class="nav navbar-nav navbar-left">
                        <span><i class="fa fa-phone"></i>+918887603331</span>
                        <hr />
                        <span><i class="fa fa-envelope"></i>info@jswebsolutions.in</span>
                        <hr />
                    </div>
                       -->
                    <div class="nav navbar-nav navbar-right">
                        <div class="minisocial-group">
                            <a target="_blank" href="https://www.facebook.com/Js-web-solutions-278328512804761/"><i class="fa fa-facebook first"></i></a>
                            <a target="_blank" href="https://twitter.com/jswebsolutions1"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="https://www.youtube.com/channel/UCvbsTUPj3zsmzAx6WUmHfRA?view_as=subscriber"><i class="fa fa-youtube"></i></a>
                            <a target="_blank" href="https://www.linkedin.com/company/jswebsolutions/"><i class="fa fa-linkedin"></i></a>
                            <a target="_blank" href="https://plus.google.com/u/0/102769766392916972392"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-main">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="<?php echo url(""); ?>">
                            <img class="logo-default" src="<?php echo asset('public/frontWebu/assets/image/js_web_solutions.in.jpg'); ?>" alt="JSWeb solutions" />
                            <img class="logo-retina" src="<?php echo asset("public/frontWebu/assets/image/js_web_solutions.in.jpg"); ?>" alt="JSWeb solutions" />
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown {{ (request()->is('')) ? 'active' : '' }}">
                                  <a href="<?php echo url(""); ?>" role="button">HOME</a>
                            </li>
                            <li class="dropdown {{ (request()->is('html_template')) ? 'active' : '' }}">
                                  <a href="<?php echo url("html_template"); ?>" role="button">HTML</a>
                            </li>
                            <li class="dropdown {{ (request()->is('php_codes')) ? 'active' : '' }}">
                                <a href="<?php echo url("php-snippets"); ?>" role="button">PHP</a>
                            </li>
                            <li class="dropdown {{ (request()->is('ajax')) ? 'active' : '' }}">
                                <a href="<?php echo url("ajax"); ?>" role="button">AJAX</a>
                            </li>
                            <li  class="dropdown {{ (request()->is('javascript')) ? 'active' : '' }}">
                                <a href="<?php echo url("javascript"); ?>" role="button">JAVA SCRIPT</a>
                            </li>
                            <li class="dropdown {{ (request()->is('jquery')) ? 'active' : '' }}">
                                <a href="<?php echo url("jquery"); ?>" role="button">JQUERY</a>
                            </li>
                            <li class="dropdown {{ (request()->is('laravel')) ? 'active' : '' }}">
                                <a href="<?php echo url("laravel"); ?>" role="button">LARAVEL </a>
                            </li>
                           <li class="dropdown {{ (request()->is('live-demo')) ? 'active' : '' }}">
                              <a href="<?php echo url("live-demo"); ?>" role="button">LIVE DEMO </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!--in feed ads--->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-fb+5w+4e-db+86"
     data-ad-client="ca-pub-4152597108794624"
     data-ad-slot="8942859090"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>  
<!--in feed ads--->
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
  @yield('content')
  <!---Footer Start-->
   <div class="modal" id="msg_modal" tabindex="-1" role="dialog"  aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                  </div>
                  <div class="modal-body">
                    <div id="msg_body"></div>
                   </div>
                  <div class="modal-footer">       
                </div>
              </div>
            </div>
            </div>
  <footer class="panel panel-default footer-base">
        <div class="content">
            <div class="container">
               
                <div class="row">
                    <div class="col-md-3 footer-left text-left">
                        <div class="row">
                            <div class="col-md-6 text-s">
                                <h3>Menu</h3>
                                <a href="<?php echo url("offers_deal"); ?>">Offers Deals</a><br />
                                <a href="http://tools.jswebsolutions.in/" target="_blank">Tools</a><br />
                                <a href="<?php echo url("term_and_condition"); ?>">Term &amp; Condition </a><br />
                                <!--
                                <a href="<?php echo url("privacy_policy"); ?>">Privacy &amp; Policy </a><br />
                                -->
                            </div>
                            <hr class="space m" />
                        <div class="btn-group social-group btn-group-icons">
                            <a target="_blank" href="https://www.facebook.com/Js-web-solutions-278328512804761/">
                                <i class="fa fa-facebook text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://twitter.com/jswebsolutions1" >
                                <i class="fa fa-twitter text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://plus.google.com/u/0/102769766392916972392" >
                                <i class="fa fa-google-plus text-xs circle"></i>
                            </a>
                            <a target="_blank" href="https://www.linkedin.com/company/jswebsolutions/" >
                                <i class="fa fa-linkedin text-xs circle"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 footer-left text-left">
                        <div class="row">
                            <div class="col-md-6 text-s">
                                <h3>Important Links</h3>
                                 <a href="<?php echo url("hire-me"); ?>">Hire me </a><br />
                                <a href="<?php echo url("about"); ?>">About Us</a><br />
                                <a href="<?php echo url("contact-us"); ?>">Contact Us</a><br />
                                <a href="<?php echo url("term-and-condition"); ?>">Term &amp; Condition </a><br />
                                <a href="<?php echo url("https://jswebsolutions.business.site/?m=true"); ?>">Google Business</a>
                                <a href="<?php echo url("privacy-policy"); ?>">Privacy &amp; Policy </a><br />      
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 footer-left text-left">
                        <h3>You can trust us</h3>
                        <p class="text-s">
                           JSWEBSOLUTIONS is a Programming &amp; Web Development Tutorials and Blog  . JSWEBSOLUTIONS  Provide  Free / Paid Programming &amp; Web development tutorials  . In this Blog We Provide Best and Useful code to for your project  . So that you use this code free and make a better and creative project .    </p>
                        <hr class="space xs" />
                        <a href="<?php echo url('about'); ?>" class="btn btn-warning">Read ...</a>
                    </div>
                    <div class="col-md-3 footer-left text-left">
                        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=2197035273722515&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page" data-href="https://www.facebook.com/Js-web-solutions-278328512804761/" data-tabs="timeline" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Js-web-solutions-278328512804761/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Js-web-solutions-278328512804761/">Js web solutions</a></blockquote></div>
                    </div>
                </div>
            </div>
            <div class="row copy-row">
                <div class="col-md-12 copy-text">
                   jswebsolutions.in © <?php echo date("Y"); ?> All Rights Reserved. Designed and Developed By by <a href="http://jswebsolutions.in" target="_blank">jswebsolutions.in</a>
                </div>
            </div>
        </div>
       
<!-- Latest compiled JavaScript -->
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo url("public/frontWebu/assets/js/script.js"); ?>"></script>
<script>
$(document).ready(function(e) {
    $(document).on('click','.download_button' , function(){
	  $(".download_button").attr('disabled' , true);
	  $("#download_response").html('<div class="notice notice-success"> <strong>Success</strong> Please Wait 5 Second for download script . </div>');
	  var open_url_new = $(this).data('downloadurl'); 
      setTimeout(function(){ 
        window.location.href = open_url_new;
        $("#download_response").html(' ');
     	$(".download_button").attr("disabled" , false);
      } , 2000);
    });
});
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118689310-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118689310-1');
</script>
<script src="<?php echo asset("public/customjs/custom.js"); ?>"></script>
<script>
$(document).ready(function(e) {
 $(document).on('submit',"#registerForm",(function(e) {
	 $('#registeRresponse').html(" ");
	 $('#registerbtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 //alert("yes");
	 e.preventDefault();
      $.ajax({
	  url: "<?php echo url("user/register"); ?>",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
          $('#registerbtn').html('Register').attr('disabled',false);  
		 if(data == 1){
			 $("#registeRresponse").html("<p style='color:green;'><strong>Registration successful !!!.</strong> </p>");
			 location.reload();
		   }
		 else{
		  $("#registeRresponse").html(data);
		  }  
	   }	
     });
  }));
});
</script>
<script>
$(document).ready(function(e) {
 $(document).on('submit',"#loginForm",(function(e) {
	 $('#loginRresponse').html(" ");
	 $('#loginBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	  e.preventDefault();
      $.ajax({
	  url: "<?php echo url("user/login"); ?>",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
         $('#loginBtn').html('Login').attr('disabled',false);  
		 if(data == 1){
			 $("#loginRresponse").html("<p style='color:green;'><strong>Login successful !!!.</strong> </p>");
			 location.reload();
		   }
		 else{
		  $("#loginRresponse").html(data);
		  }  
	   }	
     });
  }));

});
</script>
<script>
$(document).ready(function(e) {
  $(document).on('click','#login',function(){
    $('#loginForm').show();
	$("#registerForm").hide();
	$("#forgrtPasswordForm").hide();
  }); 
  $(document).on('click','#register',function(){
    $('#loginForm').hide();
	$("#registerForm").show();
	$("#forgrtPasswordForm").hide();
  }); 
  $(document).on('click','.forgotBtn',function(){
    $('#loginForm').hide();
	$("#registerForm").hide();
	$("#forgrtPasswordForm").show();
  });
});
</script>
<script>
$(document).ready(function(e) {
$(window).scroll(function () {   
 if($(window).scrollTop() > 200) {
    $('#ads_section').css('position','fixed');
    $('#ads_section').css('bottom','0'); 
 }

 else if ($(window).scrollTop() <= 200) {
    $('#ads_section').css('position','');
    $('#ads_section').css('top','');
 }  
    if ($('#ads_section').offset().top + $("#ads_section").height() > $("#footer").offset().top) {
        $('#ads_section').css('top',-($("#ads_section").offset().top + $("#sidebar").height() - $("#footer").offset().top));
    }
});

});
</script>
<script> window._peq = window._peq || []; window._peq.push(["init"]); </script>
<script src="https://clientcdn.pushengage.com/core/54448acf160928616f70abfe4f8f9735.js" async></script>
<script src="<?php echo asset("public/editor/tinymce.min.js"); ?>" ></script>
<script src="<?php echo asset("public/editor/editorBox.js"); ?>"></script>
@section('script')
@show
</body>
</html>
    
  <!--End-->
