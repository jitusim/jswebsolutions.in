<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use sHelper;

class Post extends Model{
   
       protected $table = 'blogpost';
	   protected $fillable = ['id','user_id','blogType' , 'ajax_type' , 'title' , 'title_url' , 'image' , 'description','demoUrl' , 'downloadUrl' , 'pageUrl' , 'paidStatus' , 'postedBy','deleted_at','created_at','updated_at'];
	  
	  public static function get_post_for_web($page_slug = NULL){
	     if($page_slug != NULL){
	       return DB::table('blogpost')->where([['deleted_at','=' , NULL],['page_slug' , '=' , $page_slug]])->orderBy('updated_at' , 'DESC')->paginate(10);
	     }
	     return  DB::table('blogpost')->where([['deleted_at' , '=' , NULL] ])->orderBy('updated_at' , 'DESC')->paginate(10);
	     
	  }
	  
	  public static function get_post($con = NULL){
	   if($con != NULL){
		  if(is_array($con)){
		    return Post::where($con)->orderBy('updated_at', 'DESC')->paginate(10);
		  } 
		  return Post::where([['blogType' , '=' , $con]])->orderBy('updated_at', 'DESC')->paginate(10);
		 }	
	    return Post::where([['deleted_at' , '=' , NULL] , ['demoUrl' , '!=', NULL ]])->orderby('id', 'DESC')->paginate(10);
	  }	
      
	  
	  public static function post_function($type , $title_url = NULL){
		 if($title_url != NULL){
		     return  DB::table('post_function')->where([["title_url" , '=' ,$title_url]])->first(); 
		   } 
		   $result = DB::table('post_function')->where([["subject_type" , '=' ,$type]])->get(); 
		   if($result->count()  > 0) return $result->toarray(); else return false;
		}
	 
	 
	 
	 public static function post_details($title_url){
	    return DB::table('blogpost')->where([["title_url" , '=', $title_url]])->first();
	 }	

	 public static function postList($subjectType = NULL){
		if(!empty($subjectType)){
		   return DB::table('blogpost')->where([["blogType" , '=' , $subjectType]])->orderBy('id' , 'DESC')->get();
		  }	
		return DB::table('blogpost')->orderBy('id' , 'DESC')->get();
	 }
	 
	 public static function save_post($request , $image = NULL){
		$title_url = sHelper::slug($request->title);
		$arr = self::make_post_arr($request);
		$arr['image'] = $image;
		$arr['title_url'] = $title_url;
		return DB::table('blogpost')->insertGetId($arr);
	}
	
	public static function post_update($request , $image = NULL){
	  $title_url = sHelper::slug($request->title);
	  $arr = self::make_post_arr($request);
	  $arr['image'] = $image;
	  $arr['title_url'] = $title_url; 
	  return DB::table('blogpost')->where([['id','=',$request->editID]])->update($arr);
	}
	
	public static function make_post_arr($request){
	  $data = array("page_slug"=>$request->blogSubject,
					   "title"=>$request->title,
					   "description"=>$request->descripttion,
					   "demoUrl"=>$request->demourl,
					   "downloadUrl"=>$request->downloadurl,
					   "paidStatus"=>$request->paidstaus,
					   "created_at"=>date('Y-m-d h:i:s'),
					   "updated_at"=>date('Y-m-d h:i:s'),
					   );
      return $data;					   
	
	}
	
	
	

	
	public static function get_all_post_function($id = NULL){
		   if(!empty($id)){
			  return DB::table("post_function")->where([['id','=',$id]])->first();
			 }
		   return DB::table("post_function")->where([['deleted_at' , '=' , NULL]])
											  ->orderBy('id' , 'DESC')
											  ->get();
	 }
	
}
