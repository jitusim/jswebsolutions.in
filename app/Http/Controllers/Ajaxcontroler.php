<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use DB;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class Ajaxcontroler extends Controller {
    
     
	public function post_action(Request $request){
	    $data =  array('name'=>$request->name, 'email'=>$request->email ,'message'=>$request->message);
	    Mail::to('jitendrasahu17996@gmail.com')->send(new ContactMail($data));
        echo '<div class="notice notice-success"> <strong> Success </strong> Thank you for contact me .  We will contact shortly   .</div>.';exit;
	}
  
   
    public function get_action(Request $request , $action){
	  /*Remove jobs post script start*/
	  if($action == "remove_post"){
		  if(!empty($request->postid)){
			  $delete_response = DB::table('blogpost')->where([['id' , '=' , $request->postid]])->update(['deleted_at'=>now()]);
			  if($delete_response){ echo 200;exit; }
			  else{ echo 100;exit;  }
			}
		}
	  /*End*/	
	  echo "<pre>";
	  print_r($request->all());exit;
	  	
       if($action == "news_email"){
         if(!is_null($this->input->get('news_email'))){
           if (filter_var($this->input->get('news_email') , FILTER_VALIDATE_EMAIL)) {
                $result = $this->SiteModel->newsletter();
                if($result != FALSE){
                  echo '<div class="notice notice-success"> <strong>Success</strong> Subscribe successful . </div>';exit;    
                }
              } 
              else {
                echo '<div class="notice notice-danger"> <strong> Note </strong> Please enter the valid email id . </div>';exit;
              }    
         }else{
           echo '<div class="notice notice-danger"> <strong> Note </strong> Please enter your email id . </div>';exit; 
         }
       }
        
      
    }
    
   
	
	
    public function upload_deals(){
      $this->form_validation->set_rules('title','Offers Title','required');
	  $this->form_validation->set_rules('Offers_details','Offers Details','required');
	   if($this->form_validation->run() == TRUE){
		   if(!empty($_FILES['image']['name'])){
		    $filename = $_FILES['image']['name'];
		    $imageArr = explode('.' ,$filename);
		    $ext = end($imageArr);
		     $image = md5(time()).".".$ext;
					 	/*-----image file config-start---*/
				 $postImageconfig = array();
				 $this->load->library('image_lib');
				 $postImageconfig['upload_path'] = './uploadsFiles/offers_deal/';
				 $postImageconfig['allowed_types'] = 'jpg|png|jpeg|';
				 $postImageconfig['file_name'] = $image;
				
				 $this->load->library('upload',$postImageconfig);	
				 $this->upload->do_upload('image');
	        }else { $image = ""; }
			$result = $this->SiteModel->add_offers($image);
			if($result != FALSE){
			   echo  '<div class="notice notice-success">
                        <strong>Success</strong> Upload successful .
                      </div>';exit;
			}
			else{
			   echo  '<div class="notice notice-danger">
                        <strong>Wrong </strong> Something Wrong
                      </div>';exit;
			}
		  }
		else{
		  echo validation_errors();exit;
		}  
	 //$data['postData'] = $this->SiteModel->getAdmin_postdata($data['editID']);
    }
    
    
}
?>