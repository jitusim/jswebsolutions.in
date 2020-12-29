<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
   
    public function __construct() {
      parent::__construct();
      $this->load->library('session');
      $this->load->helper('html');
	  $this->load->helper('url');
	  $this->load->model('SiteModel');
	  $this->load->helper('cookie');
	  $this->load->library('email');
    }
	
	public function page( $page= "index" , $second = NULL){
	   $data['head_title'] = $page;	
	   if(!empty($this->session->jsusers_id)){ 
	     $data['js_userData'] = $this->SiteModel->user_details($this->session->jsusers_id); 
         if($data['js_userData'] == FALSE){
		      redirect('user/signout' , 'location');
			}
		};	
	   if($page == "upload_deal"){
		   
		 }
	  $this->load->view('front/template/header',$data); 	
	  $this->load->view('management/'.$page ,$data);
	  $this->load->view('front/template/footer',$data); 	 
	}
	
	
	
/* Ajax Load content End */	
    
    
    
	
	
}
?>