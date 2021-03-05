<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use DB;

class SiteController extends Controller{
    
	public function index(){
	  
	  $data['head_title'] = $data['meta_keyword'] = $data['meta_description'] = NULL;
	  $request_url = request()->fullUrl();
	  $seo_content = DB::table('seo_content_tbl')->where([['page_url','=',$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
	   }
	  $data['pageUrl'] = "https://jswebsolutions.in/";
      $data['description'] = "Learn best php tutorial with demo , web development , web technology , php with mysql , pdo mysql , javascript , jquery , html , css, codeignitor , laravel "; 		
	  $data['imageUrl'] = "";
	  $data['post'] = Post::where([['deleted_at' , '=' , NULL]])->orderBy('updated_at', 'DESC')->paginate(15);
	  
	  $data['post_function'] =  Post::post_function(1); 
	  return view('front.index')->with($data);
	}
	
	public function page($page = NULL){
	   	$data['head_title'] = " Home | php , ajax , jquery , javascript , html , pdo mysql live demo , free download ";
	 	$data['post_function'] =  Post::post_function(1); 
		if($page == "ajax"){
		    $data['title'] = "PHP - Tutorials , php project , live demo , download script , php with ajax , php with mysql pdo";
			$data['post'] = Post::get_post(['ajax_type'=>1]);
		  }
		if($page == "javascript" || $page == "javascriptCodeBlog"){
		    $data['post'] = Post::get_post(2);
		  }  
		if($page == "jquery" || $page == "phpCodeBlog"){
		    $data['post'] = Post::get_post(3); 
		  } 
		if($page == "live_demo" || $page == "liveDemoCode"){
		   $data['post'] = Post::get_post(); 
		  } 
		if($page == "html_template" || $page == "html_template"){
		    $data['post'] = Post::get_post(4);
		  }
		if($page == "php" || $page == "phpCodeBlog" || $page == "php_codes"){
		    $page = "php";
		    $data['post'] = Post::get_post(1);
		  }     
		if($page == "offers_deal" || $page == "about" || $page == "term_and_condition" || $page == "privacy_policy" || $page == "contact_us"){
		   $data['post'] = Post::get_post();
		 }   
	
	    if(!view()->exists('front.'.$page))
			return view("404")->with($data);
		 else  
	   return view('front.'.$page)->with($data);
	}
	
	public function blogs($p1){
		if(empty($p1)){ return redirect()->back(); }
		$data['head_title'] = $data['meta_keyword'] = $data['meta_description'] = NULL;
	    $request_url = request()->fullUrl();
	    $seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
	
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		
		
		$data['resultPostData'] = Post::post_details($p1);
		$data['description'] = $data['imageUrl'] = $data['pageUrl'] = $data['pageLinked'] =  NULL;
		if($data['resultPostData'] != NULL){
			$title_url = $data['resultPostData']->title_url;
			$data['description'] = $data['resultPostData']->description;
			$image = $data['resultPostData']->image;
			$data['imageUrl'] = url("public/uploadsFiles/postImage/$image");
			$data['pageUrl'] = url("blogPost/$title_url");
			$load_html_page = $data['resultPostData']->id.'.html';
			$folder = public_path("pages/");
			$data['pageLinked'] = $folder."/".$load_html_page;
			if(!file_exists($data['pageLinked'])){
				$data['pageLinked'] = FALSE;
				}
			}
			/*Manage tags*/
			$data['tags'] = DB::table('page')->where([['private_status','=',NULL]])->get();
			if($data['tags']->count() > 0){
				foreach($data['tags'] as $tag){
					$tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
					//  $tag->number_of_post  = 10;
				}
			}
			/*End*/
	
		
	    return view("front.readBlogPost")->with($data);	
	}
	
	public function post($page , $p1){
	    $data['head_title'] = $data['meta_keyword'] = $data['meta_description'] = NULL;
	    $request_url = request()->fullUrl();
	    $seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
	
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		if(empty($p1)){ return redirect()->back(); }
		if($page == "download_post" || $page == "download"){
			$data['post_result'] =  Post::post_details($p1);
			$data['post'] = Post::postList();
			$page = 'download_post';
		}
		if($page == "blogPost" || $page == "post"){
			$data['resultPostData'] = Post::post_details($p1);
			$data['description'] = $data['imageUrl'] = $data['pageUrl'] = $data['pageLinked'] =  NULL;
			if($data['resultPostData'] != NULL){
			    $title_url = $data['resultPostData']->title_url;
			    $data['description'] = $data['resultPostData']->description;
				$image = $data['resultPostData']->image;
			    $data['imageUrl'] = url("public/uploadsFiles/postImage/$image");
				$data['pageUrl'] = url("blogPost/$title_url");
				$load_html_page = $data['resultPostData']->id.'.html';
				$folder = public_path("pages/");
				$data['pageLinked'] = $folder."/".$load_html_page;
				if(!file_exists($data['pageLinked'])){
					$data['pageLinked'] = FALSE;
				  }
			  }
			   /*Manage tags*/
        	  $data['tags'] = DB::table('page')->where([['private_status' , '=' , NULL]])->get();
        	  if($data['tags']->count() > 0){
        		  foreach($data['tags'] as $tag){
        			   $tag->number_of_post  = DB::table('blogpost')->where([['page_slug' , '=' , $tag->page_slug]])->count();
        			   //  $tag->number_of_post  = 10;
        		}
        	  }
	          /*End*/
		    $page = "readBlogPost";
		}
		 
		
	    /*if(!view()->exists('site.'.$page))
			return view("404")->with($data);
		 else */ 
	
	   return view("front.$page")->with($data);	
	}

	public function about(){
		$data['head_title'] = $data['meta_keyword'] = $data['meta_description'] = NULL;
	    $request_url = request()->fullUrl();
	    $seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		return view("front.about")->with($data);	
	}

	public function contactUs(){
		
		$data['head_title'] = $data['meta_keyword'] = $data['meta_description'] = NULL;
	    $request_url = request()->fullUrl();
	    $seo_content = DB::table('seo_content_tbl')->where([['page_url','=',(string)$request_url]])->first();
		if($seo_content != NULL){
		   $data['head_title'] = $seo_content->page_title;
		   $data['meta_keyword'] = $seo_content->meta_key_word;
		   $data['meta_description'] = $seo_content->meta_description;
		}
		return view("front.contact-us")->with($data);	
	}
}
