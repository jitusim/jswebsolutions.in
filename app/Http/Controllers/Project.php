<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
   
    public function __construct() {
      parent::__construct();
      $this->load->library('session');
      $this->load->helper('html');
	  $this->load->helper('url');
	  $this->load->model('SiteModel');
	  $this->load->helper('cookie');
	  $this->load->library('email');
	  $this->load->model('user');
    }
	
	public function index($page = "index" ){
	  $data['head_title'] = " Home";
	  $this->load->view('front/template/header',$data); 	
	  $this->load->view('front/project/'.$page ,$data);
	  $this->load->view('front/template/footer',$data); 	
	} 
	
	
	
	public function page( $page = "index" , $second = NULL){
	   if($page == "logout"){
	        $this->load->library('Facebook');
            $this->facebook->destroySession();
            // Make sure you destory website session as well.
           redirect('login');
	   } 
	   $data['head_title'] = $page;	
	   if(!empty($this->session->jsusers_id)){ 
	     $data['js_userData'] = $this->SiteModel->user_details($this->session->jsusers_id); 
         if($data['js_userData'] == FALSE){
		      redirect('user/signout' , 'location');
			}
		}	
	   if($page == "phpCodeBlog"){
		   $data['post'] = $this->SiteModel->postList(1);
		   $data['post_function'] =  $this->SiteModel->post_function(1);
		 }
	   if($page == "html_template"){
	      $data['post'] = $this->SiteModel->postList(4);
		   $data['post_function'] =  $this->SiteModel->post_function(1); 
	   }	 
	   if($page == "javascriptCodeBlog"){
		   $data['post'] = $this->SiteModel->postList(2);
		 }
	   if($page == "jQueryCodeBlog"){
		     $data['post'] = $this->SiteModel->postList(3);
		 }
	   if($page == "liveDemoCode"){
		   $data['post'] = $this->SiteModel->postList();
		 }
	   if($page == "ourTeamblog"){
		   $data['post'] = $this->SiteModel->postList();
		 }	
	   if($page == "about"){
	       $data['post'] = $this->SiteModel->postList(); 
	     }
	    if($page == "term_and_condition"){
	        $data['post'] = $this->SiteModel->postList(); 
	    }
	    if($page == "privacy_policy"){
	         $data['post'] = $this->SiteModel->postList(); 
	    }
	    if($page == "jobs"){
	        $data['post'] = $this->SiteModel->postList(); 
	    }
	    if($page == "offers_deal"){
	       $data['post'] = $this->SiteModel->postList();
	    }
	    
	    if($page == "login"){
	       //$this->load->library('Facebook'); // Automatically picks appId and secret from config
            // OR
            // You can pass different one like this
            $this->load->library('facebook', array(
                'appId' => '2044132862332757',
                'secret' => '072574ad84a20337803376fd955ec484',
                ));
		  
		   $user = $this->facebook->getUser();
		   
           if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
           }else {
            $this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login'), 
                'scope' => array("email") // permissions here
            ));
        }
	    }
	    
	    if($page == "englist_to_hindi_conversion"){
	        //redirect('user/signout' , 'location');
	         $data['head_title']  = "easy hindi typing";
	         $data['title']  = "Easy hindi typing , Easy english to hindi conversion ";
	         $data['description']  = "Easy hindi typing , Easy english to hindi conversion ";
	         $data['imageUrl']  = "http://jswebsolutions.in/uploadsFiles/online_english_to_hindi_translation_conversion.jpg";
	         return redirect('english_hindi_conversion' , 'location');
	        //$page == "tools";
	    }
	    
	   if($page == "english_hindi_conversion"){
	       $page = "englist_to_hindi_conversion";
	       $data['head_title']  = "English to hindi &amp; Hindi to English Conversion";
             $data['title']  = "Easy hindi typing , Easy english to hindi conversion ";
             $data['description']  = "Easy hindi typing , Easy english to hindi conversion ";
             $data['imageUrl']  = "http://jswebsolutions.in/uploadsFiles/online_english_to_hindi_translation_conversion.jpg";
             $data['post'] = $this->SiteModel->postList();
	   }  
	    
	   $this->load->view('front/template/header',$data); 	
	  $this->load->view('front/'.$page ,$data);
	  $this->load->view('front/template/footer',$data); 	 
	}
	
	public function post_function($page , $first){
	  $data['resultPostData'] =  $this->SiteModel->post_function($first , "single");
	  $data['head_title'] = $page." | ".$data['resultPostData']['title'];
	  $data['post_function'] =  $this->SiteModel->post_function(1);
	  $this->load->view('front/template/header',$data); 	
	  $this->load->view('front/'.$page ,$data);
	  $this->load->view('front/template/footer',$data); 	
	}
	
	public function download_post($post_id){
	    if(!is_null($post_id)){
	       $data['post_result'] =  $this->SiteModel->getAdmin_postdata($post_id);
	       $data['head_title']  = "download | ".$data['post_result']['title'];
	       $data['post'] = $this->SiteModel->postList();
	       $this->load->view('front/template/header',$data); 	
	       $this->load->view('front/download_post',$data);
	       $this->load->view('front/template/footer',$data); 
	    }
	}
	
	public function blogPost($title_url){
	  //$pageName = base64_decode($pageID);
	  if(!empty($title_url)){
		 $data['resultPostData'] =  $this->SiteModel->singlepostList($title_url);
		 $data['head_title'] = $data['resultPostData']['title'];
		 //echo "<pre>";
		 //print_r($data['resultPostData']);exit;
		 //print_r($data['resultPostData']);exit;
		 $title_url = $data['resultPostData']['title_url'];
		 $data['title'] = $data['resultPostData']['title'];	
		 $data['description'] = $data['resultPostData']['description'];
		 $image = $data['resultPostData']['image'];
		 $data['imageUrl'] = base_url()."uploadsFiles/postImage/$image";
		 //$data['pageUrl'] = base_url()."blogPost/$pageID";
		 $data['pageUrl'] = base_url()."blogPost/$title_url";
		 $data['pageLinked'] = APPPATH.'views/pages/'.$data['resultPostData']['id'].'.html';
		 //echo "<pre>";
		 //print_r($data['pageLinked']);exit;
	      if(!file_exists($data['pageLinked'])){
			  $data['pageLinked'] = FALSE;
			}
		 // print_r($data['pageLinked']);exit;
		 //print_r($data['pageLinked']);exit;
		 $this->load->view('front/template/header',$data); 	
	     $this->load->view('front/readBlogPost',$data);
	     $this->load->view('front/template/footer',$data);  
		}
	   else{ redirect("/",'location'); }	
	  	
	} 
	
	
/* Ajax Load content Start */	
	public function loadAjaxDatalogin(){
	  $this->load->view('front/loginModal');
	}
	
	/*contact form code start*/
		public function contactMsg (){
	  
	   if($this->input->post('name')){
		   if($this->input->post('email')){
			   if($this->input->post('mobile')){
				  if($this->input->post('message')){
			   	     $msg = '<div style="font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#eeeeee">
	<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
    <tbody>
        <tr>
        	<td>
                <table align="center" width="750px" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="width:750px!important">
                <tbody>
                	<tr>
                    	<td>
                			<table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
                            <tbody>
                            	<tr>
                                    <td colspan="3" height="80" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="padding:0;margin:0;font-size:0;line-height:0">
                                        <table width="690" align="center" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        	<tr>
                                            	<td width="30"></td>
                                                <td align="left" valign="middle" style="padding:0;margin:0;font-size:0;line-height:0"></td>
                                                <td width="30"></td>
                                            </tr>
                                       	</tbody>
                                        </table>
                                  	</td>
                    			</tr>
                                <tr>
                                    <td colspan="3" align="center">
                                        
                             	</td>
                   			</tr>
                            
                            <tr bgcolor="#ffffff">
                                <td width="30" bgcolor="#eeeeee"></td>
                                <td>
                                    <table width="570" align="center" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    	<tr>
                                        	<td colspan="4" align="center">&nbsp;</td>
                                      	</tr>
                                        <tr>
                                        	<td colspan="4" align="center"><h2 style="font-size:24px">User Contact Email</h2></td>
                                      	</tr>
                                        <tr>
                                        	<td colspan="4">&nbsp;</td>
                                      	</tr>
                                        <tr>
                                        	<td width="120" align="right" valign="top"><span  style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">Name</span></td>
                                            <td width="30"></td>
                                            <td align="left" valign="middle">
                                                <h3 style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">'.$this->input->post("name").'</h3>
                                                <div style="line-height:5px;padding:0;margin:0">&nbsp;</div>
                                          	</td>
                                            <td width="30"></td>
                                        </tr>
										<tr>
                                        	<td width="120" align="right" valign="top"><span  style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">Mobile</span></td>
                                            <td width="30"></td>
                                            <td align="left" valign="middle">
                                                <h3 style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">'.$this->input->post("mobile")."".$this->input->post('website').'</h3>
                                                <div style="line-height:5px;padding:0;margin:0">&nbsp;</div>
                                          	</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                        	<td width="120" align="right" valign="top"><span  style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">Email ID</span></td>
                                            <td width="30"></td>
                                            <td align="left" valign="middle">
                                            	<h3 style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">'.$this->input->post("email").'</h3>
                                              	<div style="line-height:5px;padding:0;margin:0">&nbsp;</div>
                                          	</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                        	<td width="120" align="right" valign="top"><span  style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">Mobile</span></td>
                                            <td width="30"></td>
                                            <td align="left" valign="middle">
                                            	<h3 style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">'.$_POST['mobile'].'</h3>
                                              	<div style="line-height:5px;padding:0;margin:0">&nbsp;</div>
                                              	
                                          		<div style="line-height:10px;padding:0;margin:0">&nbsp;</div>
                                           	</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                        	<td width="120" align="right" valign="top"><span  style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0">Comment </span></td>
                                            <td width="30"></td>
                                            <td align="left" valign="middle">
                                            	<div style="color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0">'.$_POST['message'].'</div>
                                              	<div style="line-height:5px;padding:0;margin:0">&nbsp;</div>
                                          	</td>
                                            <td width="30"></td>
                                        </tr>
                                  	</tbody>
                                    </table>
                                    <table width="570" align="center" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    	<tr>
                                        	<td>
                                            	<h2 style="color:#404040;font-size:22px;font-weight:bold;line-height:26px;padding:0;margin:0">&nbsp;</h2>
                                          	</td>
                                      	</tr>
                                        <tr>
                                        	<td align="center">
                                                <div style="text-align:center;width:100%;padding:40px 0">
                                                    <table align="center" cellpadding="0" cellspacing="0" style="margin:0 auto;padding:0">
                                                    <tbody>
                                                    	<tr>
                                                        	<td align="center" style="margin:0;text-align:center"></td>
                                                    	</tr>
                                                   	</tbody>
                                                 	</table>
                                              	</div>
                                        	</td>
                                      </tr><tr><td>&nbsp;</td>
                                      </tr></tbody></table></td>
                                <td width="30" bgcolor="#eeeeee"></td>
                            </tr>
                          	</tbody>
                            </table>
                  			<table align="center" width="750px" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="width:750px!important">
                            <tbody>
                            	<tr>
                                	<td>
                                        <table width="630" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
                                        <tbody>
                                        	<tr><td colspan="2" height="30"></td></tr>
                                            
                                            <tr><td colspan="2" height="5"></td></tr>
                                           
                                      	</tbody>
                                        </table>
                                   	</td>
                  				</tr>
                          	</tbody>
                            </table>
                  		</td>
                	</tr>
              	</tbody>
                </table>
            </td>
		</tr>
 	</tbody>
    </table>
</div>';	
					 $config['mailtype'] = 'html';
                     $this->email->initialize($config);
					 $this->email->from("info@jswebsolutions.in","jswebsolutions");
					 $this->email->to("jitendrasahu17996@gmail.com");
					 $this->email->subject('Contact Enquiry');
					 $this->email->message($msg);
					 if( $this->email->send() ){
					     
					      //$this->email->print_debugger(array('headers'));
					      echo '<div class="notice notice-success">
                                 <strong>Success </strong>Message send , We will contact shortly  .</div>.';exit;
		               }
		             else{
		                 //echo "<pre>";
		                 print_r($this->email->print_debugger(array('headers')));exit;
		                echo '<div class="notice notice-danger">
                                 <strong>Note </strong>Un-expected try again .</div>.';exit; 
		               }     
			   }
			 else{
			    echo '<div class="notice notice-danger">
                         <strong>Note </strong>Message is required .</div>.';exit; 
			   }   
			   }   
			   else{
				  echo '<div class="notice notice-danger">
									 <strong>Note </strong>Mobile number is required  .</div>.';exit; 
			   }
			 }
		   else{
			    echo '<div class="notice notice-danger">
                         <strong>Note </strong>Email is required .</div>.';exit; 
			 }	 
		 }
	   else{
		  echo '<div class="notice notice-danger">
                         <strong>Note </strong>Name is required .</div>.';exit;  
		 }	 	
	   
	}
	/*Contact form code End*/
	
/* Ajax Load content End */	
    
    
    
	
	
}
?>