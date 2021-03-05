<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;
use sHelper;
use DB;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $data['title'] = 'Post | jswebsolutions.in';
        return view('jsadmin.post.list')->with($data);
    }

    public function create(){
        $data['title'] = 'Post | jswebsolutions.in';
        $data['pages'] = Pages::where([['deleted_at','=',NULL],['status','=','A']])->get();
        return view('jsadmin.post.create')->with($data);
    }

    public function delete($id){
        $post = Post::where([['id','=',$id]])->first();
        if($post != NULL){
             $post->deleted_at = now();
             if($post->save()){
                return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                                        <strong>Success </strong> Record delete successfully.
                                                    </div>']);
             }else{
                return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                                        <strong>Wrong </strong> Something went wrong, please try again.
                                                    </div>']);
             }
        }else{
            return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                                        <strong>Wrong </strong> Something went wrong, please try again.
                                                    </div>']);  
        }
    }

    public function edit($id){
        if(empty($id)) return redirect()->back();   
        $data['title'] = 'Edit Post | jswebsolutions.in';
		$data['post_detail'] =  Post::find($id);
      	$data['pages'] = Pages::where([['deleted_at' , '=' , NULL] , ['status' , '=' , 'A']])->get();

        return view('jsadmin.post.edit')->with($data);   
    }

    public function update(Request $request ,$id){
        $image = $this->upload_image($request);
	  	$response = Post::post_update($request , $image);
		 if($response){
		    return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                                        <strong>Success </strong> Post update Successful.
                                                    </div>']);  
		   }
		 else{
		     return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                                             <strong>Wrong </strong> Something Went wrong , please try again .
                                                        </div>.']);  
		  }  
    }

    public function savePost(Request $request){
        $response = Post::save_post($request);
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
                                                        <strong>Success </strong> post create successfully.
                                                    </div>.']); 
    }


    public function ajaxPostList(Request $request){
        // echo "<pre>";
        // print_r(request()->all());exit;
        $limit = request()->input( 'length' );
        $start = request()->input( 'start' );
        $columns = array( 0=>'id', 1=>'f_name', 2=>'mobile', 3=>'name' );
        $dir = $request->input( 'order.0.dir' );
        if ( $dir == 'asc' ) {
            $dir = 'ASC';
        } else {
            $dir = 'DESC';
        }
        $order = $columns[$request->input( 'order.0.column' )];
        $postQuery = Post::query();
        $totalRecord = $postQuery->count();
        $posts = $postQuery->skip( $start )->take( $limit )->get();
        $postList = [];
        if ( $posts->count() > 0 ) {
            $i = 1;
            foreach ( $posts as $post ) {
                $change_credential = NULL;

                $delete_btn =  "<a href='javascript::void()' data-postid='".$post->id."' data-toggle='tooltip' title='Add category' class='btn btn-danger removePage' style='margin-right: 5px;'><i class='fas fa-trash'></i></a>&nbsp;";

                $edit_btn = '<a href="'.route("admin.post.edit-post",[$post->id]).'" data-toggle="tooltip" title="Edit Record" class="btn btn-primary" style="margin-right: 5px;">
				<i class="fas fa-edit"></i> 
				</a>';

                $postArr = [];
                $postArr['sn'] = $i;
                $postArr['title'] = $post->title;
                $postArr['action'] = $delete_btn.' '.$edit_btn.' '.$change_credential;
                $i++;
                $postList[] = $postArr;
            }
        }
       
        $json_data = array(
            'draw'            => intval( request()->input( 'draw' ) ),
            'recordsTotal'    => intval( $totalRecord ),
            'recordsFiltered' => intval( $totalRecord ),
            'data'            => $postList
        );
        return json_encode( $json_data );
        
    }


}
