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
                                <a href="<?php echo base_url("offers_deal"); ?>">Offers Deals</a><br />
                                <a href="http://tools.jswebsolutions.in/" target="_blank">Tools</a><br />
                                <a href="<?php echo base_url("term_and_condition"); ?>">Term &amp; Condition </a><br />
                                <!--
                                <a href="<?php echo base_url("privacy_policy"); ?>">Privacy &amp; Policy </a><br />
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
                                <h3>Menu</h3>
                                <a href="<?php echo base_url("about"); ?>">About Us</a><br />
                                <a href="<?php echo base_url("contact_us"); ?>">Contact Us</a><br />
                                <a href="<?php echo base_url("term_and_condition"); ?>">Term &amp; Condition </a><br />
                                <a href="<?php echo base_url("https://jswebsolutions.business.site/?m=true"); ?>">Google Business</a>
                                <!--
                                <a href="<?php echo base_url("privacy_policy"); ?>">Privacy &amp; Policy </a><br /> -->
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 footer-left text-left">
                        <h3>You can trust us</h3>
                        <p class="text-s">
                           JSWEBSOLUTIONS is a Programming &amp; Web Development Tutorials and Blog  . JSWEBSOLUTIONS  Provide  Free / Paid Programming &amp; Web development tutorials  . In this Blog We Provide Best and Useful code to for your project  . So that you use this code free and make a better and creative project .    </p>
                        <hr class="space xs" />
                        <a href="<?php echo base_url('about'); ?>" class="btn btn-warning">Read ...</a>
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
        <link rel="stylesheet" href="js/font-awesome.css">
<!-- Latest compiled JavaScript -->
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<script src="<?php echo base_url("customjs/custom.js"); ?>"></script>
<script>
$(document).ready(function(e) {
 $(document).on('submit',"#registerForm",(function(e) {
	 $('#registeRresponse').html(" ");
	 $('#registerbtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 //alert("yes");
	 e.preventDefault();
      $.ajax({
	  url: "<?php echo base_url("user/register"); ?>",	  
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
	  url: "<?php echo base_url("user/login"); ?>",	  
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
  /*contact script start*/
  $(document).on('submit',"#contactForm",(function(e) {
	 //alert("yes");
	 $('#contactMsgbtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#responseMsg").html(" ");
	  e.preventDefault();
      $.ajax({
      url: "<?php echo base_url("SiteController/contactMsg"); ?>",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		 //alert(data);
		 $("#responseMsg").html(data);
		 $('#contactMsgbtn').html('Send message').attr('disabled',false);
		 $("#reset").click();
		 //setTimeout(function(){ location.reload() } , 1000);  	
	   }	
     });
  }));
  /*Contact script End*/
  
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
 $("#header_top_div").hide();
 $(window).scroll(function(){
   var w_pos = $(document).scrollTop();
   if( w_pos > 10){
	    $(".w_pos").html(w_pos); 	 
        $("#header_top_div").show().css({"position":"fixed", "top": "0" , "left":"0" , "right":"0" , "z-index":"1000"});
	 }
   else{
	  $("#header_top_div").hide(); 
	 }	 
 });   
});
</script>
<script> window._peq = window._peq || []; window._peq.push(["init"]); </script>
<script src="https://clientcdn.pushengage.com/core/54448acf160928616f70abfe4f8f9735.js" async></script>
<script src="<?php echo base_url("editor/tinymce.min.js"); ?>" ></script>
<script src="<?php echo base_url("editor/editorBox.js"); ?>"></script>
</body>
</html>
  