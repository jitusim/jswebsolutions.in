<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Pages;
use DB;
use sHelper;
use App\SeoContent;


class AdminController extends Controller {
   
   
    public function page($page , $p1 = NULL){
        $data['head_title'] = ucfirst("Admin Dashboard | jswebsolutions");      
        if(!Auth::check() || Auth::user()->roll_type != 1){
		    return redirect('/');
		  }
		if($page == "create_post"){
		   $data['pages'] = Pages::where([['deleted_at' , '=' , NULL],['status','=','A']])->get();
		 }   
		if($page == "post"){
		   $data['pageList'] = \App\Post::orderBy('created_at','DESC')->paginate(20);
		}
		if($page == "edit_post"){
		    if(empty($p1)) return redirect()->back();   
			$data['post_detail'] =  \App\Post::where([['id' , '=' , base64_decode($p1)]])->first();
			$data['pages'] = Pages::where([['deleted_at' , '=' , NULL] , ['status' , '=' , 'A']])->get();
		
		 }
		if($page == "post_function"){
			$data['pages'] = Pages::where([['deleted_at','=',NULL] , ['status','=','A']])->get();
		 } 
		if($page == "pages"){
		    $data['pageList'] = DB::table('page')->get();
		}
		if($page == "create_page"){
			$data['pageList'] = sHelper::parentPages();
		}
		if($page == "post_function_list"){
		   $data['post_function_list'] = \App\Post::get_all_post_function();
		 } 
		if($page == "edit_post_function"){
		   $data['post_function_detail'] = \App\Post::get_all_post_function($p1);
		 } 
		 if($page == "add_seo_content"){
		    if(empty($p1)) return redirect()->back();
			$data['post'] = DB::table('blogpost')->where([['id' , '=' , base64_decode($p1)]])->first();
		 } 
		 if($page == "edit_page" ){
		     $data['pageList'] = DB::table('page')->get();
		     $data['page_content'] = DB::table('page')->where([['page_slug' , '=' , $p1]])->first();
		  }  
		 /*edit seo page*/
		if($page == "edit_seo_page"){
			 $data['post'] = NULL;
			 if(!empty($p1)){
			    $data['post'] = DB::table('seo_content_tbl')->where([['id','=',$p1]])->first();
			   }
		}
		 /*End*/ 
	
	    if(!view()->exists('admin.'.$page))
          return view("404")->with($data);
        else  
          return view('admin.'.$page)->with($data);
	}	
	
	public function post_aciton(Request $request , $action){
	    /*edit page create*/
	    if($action == "edit_page"){
		  if(!empty($request->page_id)){
			if(!empty($request->page_name)){
			  $page_slug_name = sHelper::slug($request->page_name);
			  $save_response = DB::table('page')
			                      ->where([['id' , '=' , $request->page_id]])
			                      ->update(['page_slug'=>$page_slug_name ,'page_title'=>$request->page_title,
								            'page_name'=>$request->page_name , 
											'priority'=>1 , 'status'=>'A',
                                            'meta_key_word'=>$request->meta_keyword, 
			                                'meta_description'=>$request->meta_description,                                            
											'updated_at'=>date('Y-m-d H:i')]);
			  if($save_response){
				   return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong> Page create Successful !!!.</div>.']);
				}
			  else{
				 return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Something went wrong , please try again  !!!.</div>.']);
				}	
			}
		  else{
			 return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Page name is required !!!.</div>.']); 
			  }	
			}
		}
	  /*save page name*/	
	  	if($action == "save_page"){
		  if(!empty($request->page_name)){
			  $page_slug_name = sHelper::slug($request->page_name);
			  $save_response = DB::table('page')->insert(['parent_id'=>$request->parent_id , 'page_slug'=>$page_slug_name , 'page_title'=>$request->page_title , 'page_name'=>$request->page_name , 'priority'=>1 , 'status'=>'A' ,
			   'meta_key_word'=>$request->meta_keyword,'meta_description'=>$request->meta_description, 'created_at'=>date('Y-m-d H:i') , 'updated_at'=>date('Y-m-d H:i')]);
			  if($save_response){
				   return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong> Page create Successful !!!.</div>.']);
				}
			  else{
				 return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Something went wrong , please try again  !!!.</div>.']);
				}	
			}
		  else{
			 return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Page name is required !!!.</div>.']); 
			}	
		}
		/*End*/
	    /*Save SEO content*/
	   if($action == "save_seo_content"){
		   if(!empty($request->post_id)){
			   $save_response = DB::table("blogpost")->where([['id' , '=' , $request->post_id]])->update(['meta_keyword'=>$request->meta_key_word, 'meta_description'=>$request->meta_description , 'page_title'=>$request->title]);  
				if($save_response){
				  return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong> Record Save Successful  .</div>.']);  
				}
				else{
				   return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Something Went wrong , please try again  .</div>.']);  
				}
			 }
		 }
	  /*End*/
	    /*Save site map response*/
	  if($action == "save_sitemap"){
		  $response = \App\Sitemap::save_site_map($request);
		  if($response){
			 return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong> Record Save Successful  .</div>.']);  
			 }
		   else{
			 return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Something Went wrong , please try again  .</div>.']);  
			 }
		}	
		/*End*/
	  if($action == "edit_post_function"){
		  $response = Post::edit_post_function($request);
		  if($response){
			 return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong> Post update Successful  .</div>.']);  
			 }
		   else{
			 return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Something Went wrong , please try again  .</div>.']);  
			 }
		   
		}	
	 
	  if($action == "edit_post"){
	     $image = $this->upload_image($request);
	  	 $response = \App\Post::post_update($request , $image);
		 if($response){
		    return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong> Post update Successful  .</div>.']);  
		   }
		 else{
		     return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Something Went wrong , please try again  .</div>.']);  
		  }  
		  
		}	
	  /*Save post ascript start*/
	  if($action == "save_post"){
		 	$response = \App\Post::save_post($request);
			if($response){
				//print_r($data['success']);exit;
				$location = url("public/pages/");
				//$myFile = $location.$data['success'].".html";
				$myFile = "public/pages/".$response.".html";
				$fh = fopen($myFile,'w');
				$stringData = "";
				fwrite($fh, $stringData);
				fclose($fh);
			}
		   return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong>Message send , We will contact shortly  .</div>.']);  
		}	
	 /*End*/	
	}
	
	/*save seo content page*/
	public function save_seo_page(Request $request){
	  $response = SeoContent::updateOrcreate(['id'=>$request->editid] , 
										 ['page_url'=>$request->url,
										  'page_title'=>$request->title,
										  'meta_key_word'=>$request->meta_key_word,
										  'meta_description'=>$request->meta_description,
										  'created_at'=>now(),
										  'updated_at'=>now()
										 ]);
	  if($response){
		    return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong> Record Save Successfully  .</div>.']);  
		   }
		 else{
		     return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Something Went wrong , please try again  .</div>.']);  
		  } 
	 
	}
	/*End*/

	public function seo_management_list(Request $request){
		if(request()->ajax()){
				$query = DB::table('seo_content_tbl')->where([['deleted_at','=',NULL]]);
				if(!empty($request->search_url)){
					$query->where([['page_url','=',trim($request->search_url)]]);
				}			
			    $seo_page_list = $query->get();
				$tr = [];
				if($seo_page_list->count() > 0){
					$i = 1;
					foreach($seo_page_list as $list){
						$list_new = [];
						$list_new['sn'] = $i;
						$list_new['url'] =  $list->page_url;
						$action = "<a class='btn btn-success' href='".url("js_admin/edit_seo_page/$list->id")."'>Edit</a>";
						$list_new['action'] = $action;
						$i++;
						$tr[] = $list_new;
					}
				}
				$json_data = array(
                    "draw"            => intval(request()->input('draw')),  
                    "recordsTotal"    => intval($seo_page_list->count()),  
                    "recordsFiltered" => intval($seo_page_list->count()), 
                    "data"            => $tr   
                );
                 return json_encode($json_data); exit;
			  }
	}


}
?>