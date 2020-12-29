<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;

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
	  //echo "<pre>";
	  //print_r($data['post_details']);exit;
	  /*load View script start*/
	   if(!view()->exists('front.function.php'))
			return view("404")->with($data);
	   else  
	   return view('front.function.php')->with($data);
	  /*End*/ 
	}
	
}
