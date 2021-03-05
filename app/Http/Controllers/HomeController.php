<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use DB;
use App\Model\Admin\Interview;

class HomeController extends Controller{
	
	public function index($page_slug = NULL){
	  $data['head_title'] = $data['meta_keyword'] = $data['meta_description'] = NULL;
	  $request_url = request()->fullUrl();
	  $seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
	 	if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
	   }
	  $data['pageUrl'] = "https://jswebsolutions.in/";
      $data['title'] = "jswebsolutions |  Learn best php tutorial with demo , web development , best web design, javascript  tutorial with demo , jquery tutorials with demo , php with ajax ,  new html code,latest css, new framework, php course, html course"; 
      $data['imageUrl'] = "";
      /*SEO for page */
      if($page_slug != NULL){
	      $seo_page_content = DB::table('page')->where([['page_slug' , '=' , $page_slug]])->first();
	      if($seo_page_content != NULL){
	       	  $data['description'] = $seo_page_content->meta_description;		
        	  $data['pageUrl'] = "https://jswebsolutions.in/";
          }
	  }
	  /*End*/
	  $data['posts'] = Post::get_post_for_web($page_slug);
	  $data['post_function'] =  Post::post_function(1); 
	  $page = "index";
	  /*Manage tags*/
	  $data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
	  if($data['tags']->count() > 0){
		  foreach($data['tags'] as $tag){
			   $tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
		}
	  }
	  /*End*/
	  if($page_slug == "hire-me"){
         $page = $page_slug;
      }
      if(in_array($page_slug , ["offers_deal" , "term_and_condition" , "privacy_policy" , "about" , "contact_us"])){
           $page = $page_slug;
      }
      return view("front.$page")->with($data);	 
	}

	public function contact_send(Request $request){
	    $data =  array('name'=>$request->name,
		               'email'=>$request->email ,
		               'message'=>$request->message);
					   
	    Mail::to('jitendrasahu17996@gmail.com')->send(new ContactMail($data));
        echo '<div class="notice notice-success"> <strong> Success </strong> Thank you for contact me .  We will contact shortly   .</div>.';exit;
	}


	public function git(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
				//  $tag->number_of_post  = 10;
			}
		}
	  /*End*/
		$data['posts'] = Post::get_post_for_web("laravel");
		return view("front.git")->with($data);	 
	}

	
	public function jquery(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
			}
		}
	  /*End*/
	    $data['post_function'] =  Post::post_function(1); 
		$data['posts'] = Post::get_post_for_web("jquery");
		return view("front.jquery")->with($data);	 
	}

	public function privacyPolicy(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
			}
		}
	  /*End*/
		return view("front.privacy_policy")->with($data);	 
	}
	public function termAndCondition(){
		// echo "<pre>";
		// print_r("working");exit;
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
			}
		}
	  /*End*/
	    //$data['post_function'] =  Post::post_function(1); 
		//$data['posts'] = Post::get_post_for_web("jquery");
		return view("front.term_and_condition")->with($data);	 
	}

	public function javascript(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
			}
		}
	  /*End*/
	    $data['post_function'] =  Post::post_function(1); 
		$data['posts'] = Post::get_post_for_web("javascript");
		//return view("front.javascript")->with($data);	
		return view("front.javascript")->with($data);	  
	}
	
	public function laravel(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
			}
		}
	  /*End*/
		$data['posts'] = Post::get_post_for_web("laravel");
		return view("front.laravel")->with($data);	 
	}

	public function liveDemo(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
			}
		}
	  /*End*/
	  	$data['post_function'] =  Post::post_function(1); 
		$data['post'] = Post::get_post(); 
		return view("front.live_demo")->with($data);	 
	}
	
	
	public function ajax(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
				//  $tag->number_of_post  = 10;
			}
		}
	  /*End*/
		$data['posts'] = Post::get_post(['ajax_type'=>1]);
		//echo "<pre>";
		//print_r($data['post']);exit;
		return view("front.ajax")->with($data);	 
	}
	
	
	public function hire_me(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		 /*Manage tags*/
		$data['tags'] = DB::table('page')->where([['private_status','=', NULL]])->get();
		if($data['tags']->count() > 0){
			foreach($data['tags'] as $tag){
				$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
				//  $tag->number_of_post  = 10;
			}
		}
	  /*End*/
		$data['posts'] = Post::get_post(['ajax_type'=>1]);
		return view("front.hire-me")->with($data);	 
	}

	public function InterviewQuestionPost(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		//echo "working";exit;
		$data['post_function'] = Interview::get(); 
	
		//$data['posts'] = Post::get_post(['ajax_type'=>1]);
		//$data['post_function'] = Post::post_function(1);
		return view("front.interview.question-list")->with($data);	 
	}

	public function question(){
		$data[] = NULL;
		$request_url = request()->fullUrl();
	  	$seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		//echo "working";exit;
		$data['post_function'] = Interview::get(); 
	
		//$data['posts'] = Post::get_post(['ajax_type'=>1]);
		//$data['post_function'] = Post::post_function(1);
		return view("front.interview.question-detail")->with($data);	 
	}
	
   
}
