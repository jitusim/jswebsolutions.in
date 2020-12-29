$(document).ready(function(e) {
    /*Contact form script start*/
  $(document).on('submit',"#contactForm",(function(e) {
	// $('#contactMsgbtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 //$("#responseMsg").html(" ");
	  e.preventDefault();
      $.ajax({
      url: url+"/ajax_post/send_contact_request",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		 //alert(data);
		 $("#responseMsg").html(data);
		 $('#contactMsgbtn').html('Send message').attr('disabled',false);
		 //$("#reset").click();
		 //setTimeout(function(){ location.reload() } , 1000);  	
	   }	
     });
  }));
  /*Contact script End*/
    /*closed modal start*/
    $(document).on('click',".close_modal" , function(){
         $("#msg_modal").hide();
    });
    /*End*/
	/*News letter script start*/
	$(document).on('click','#subscribe_button',function(){
	  $("#subscribe_button").attr('disabled',true);
	  var news_email = $("#email_newslettter").val();
	   if( news_email != ""){
		   $.ajax({
			  url:base_url+"Ajaxcontroler/news_email",
			  type:"GET",
			  data:{ news_email:news_email },
			  success: function(data){
			      $("#subscribe_button").attr('disabled',false);
			     // $("#msg_modal").show();
				 $("#news_letter_response").html(data);
			  }
		    });
		 }
	});
	/* End */
	/*Upload deals script  start*/
	 $(document).on('submit',"#upload_best_deal",(function(e) {
	   $('#upload_deal_resonse').html(" ");
	   $('#upload_deal_btn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 e.preventDefault();
      $.ajax({
	  url: base_url+"/Ajaxcontroler/upload_deals",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		 $('#upload_deal_btn').html('Upload').attr('disabled',false);  
		 $("#upload_deal_resonse").html(data);  
	   }	
     });
  })); 
	/*End*/
	/*Register sgn p code statrt*/
 $(document).on('submit',"#registerForm",(function(e) {
	 $('#registeRresponse').html(" ");
	 $('#registerbtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 //alert("yes");
	 e.preventDefault();
      $.ajax({
	  url: base_url+"/user/register",	  
	 // url: "<?php echo base_url("user/register"); ?>",	  
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
  /*Register sgn p code End*/
});
