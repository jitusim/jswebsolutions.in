<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use DB;

class Php extends Controller{
    
	public function page($title = NULL){
	
	  $data['head_title'] = " Home | php , ajax , jquery , javascript , html , pdo mysql live demo , free download ";
	  $data['meta_keyword'] = "learn best php tutorial with demo , learn web development with demo , best web design tutorials , javascript tutorial , new html code , latest css, new framework , codeignitor tutorials with demo , php with mysql , php with ajax ,  php course, html course"; 
      $data['meta_description'] = "Jswebsolution || Learn best php tutorial with demo , web development , web technology , php with mysql , pdo mysql , javascript , jquery , html , css, codeignitor , laravel  "; 		
	  $data['pageUrl'] = "https://jswebsolutions.in/";
      $data['title'] = "jswebsolutions |  Learn best php tutorial with demo  , web development , best web design, javascript  tutorial with demo , jquery tutorials with demo , php with ajax ,  new html code,latest css, new framework, php course, html course"; 
      $data['description'] = "Learn best php tutorial with demo , web development , web technology , php with mysql , pdo mysql , javascript , jquery , html , css, codeignitor , laravel "; 		
	  $data['imageUrl'] = "";
	  $data['post_function'] = Post::post_function(1);
	  $data['post_details'] =  Post::post_function(1 , $title); 
	  /*load View script start*/
	   if(!view()->exists('front.function.php'))
			return view("404")->with($data);
	   else  
	   return view('front.function.php')->with($data);
	  /*End*/ 
	}

	public function phpSnippets(){
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
		$data['posts'] = Post::get_post_for_web("php_codes");
		
	 	if(!view()->exists('front.php'))
			return view("404")->with($data);
	    else  
	    return view('front.php')->with($data);
	}
	
}
