<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Model\PostFunction;
use sHelper;

class FunctionController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $data['title'] = 'admin dashboard | jswebsolutions.in';
        return view( 'jsadmin.functions.list' )->with( $data );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $data['title'] = 'admin dashboard | jswebsolutions.in';
        $data['pages'] = sHelper::parentPages();
        // echo "<pre>";
        // print_r($data['pages']);exit;
        return view( 'jsadmin.functions.create' )->with( $data );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $title_url = sHelper::slug($request->title);
	  	$response = PostFunction::create(["subject_type"=>$request->blogSubject,
                                    "title_url"=>$title_url,
                                    "title"=>$request->title,
                                    "description"=>$request->editor1,
                                    "created_at"=>date("Y-m-d h:i:s"),
                                    "updated_at"=>date("Y-m-d h:i:s") 
                                    ]);
        if($response){
			 return redirect()->back()->with(['msg'=>'<div class="alert alert-success">
                                                        <strong>Success </strong> Post update Successful.
                                                      </div>.']);  
			 }
		   else{
			 return redirect()->back()->with(['msg'=>'<div class="alert alert-danger">
                                                        <strong>Wrong </strong> Something Went wrong , please try again.
                                                    </div>.']);  
			 }	
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $data['title'] = 'admin dashboard | jswebsolutions.in';
        $data['pages'] = sHelper::parentPages();
        $data['post_function_detail'] = PostFunction::find($id);
        return view( 'jsadmin.functions.edit' )->with( $data );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $title_url = sHelper::slug($request->title);
	    $response = PostFunction::where([['id','=',$id]])
                                ->update(["subject_type"=>$request->blogSubject,
                                        "title_url"=>$title_url,
                                        "title"=>$request->title,
                                        "description"=>$request->editor1]);
        if($response){
            return redirect()->back()->with(['msg'=>'<div class="notice notice-success">
                                        <strong>Success </strong> Post update Successful  .</div>.']);  
            }
        else{
            return redirect()->back()->with(['msg'=>'<div class="notice notice-danger">
                                        <strong>Wrong </strong> Something Went wrong , please try again  .</div>.']);  
        }
		   
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $postFunction = PostFunction::find( $id );
        if ( $postFunction != NULL ) {
            $postFunction->deleted_at = now();
            if ( $postFunction->save() ) {
                return redirect()->back()->with( ['msg'=>'<div class="alert alert-success">
                                           <strong>Success </strong> Post create Successful !!!.</div>.'] );
            } else {
                return redirect()->back()->with( ['msg'=>'<div class="alert alert-danger">
                                           <strong>Success </strong> Something went wrong, please try again.</div>.'] );
            }
        }
    }

    public function ajaxFunctionList( Request $request ) {
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
        $pageQuery = PostFunction::query();
       
        $totalRecord = $pageQuery->count();
        $postFunctionList = $pageQuery->skip( $start )->take( $limit )->get();
        $postFunctionListArr = [];
        if ( $postFunctionList->count() > 0 ) {
            $i = 1;
            foreach ( $postFunctionList as $post ) {
                $change_credential = NULL;

                $delete_btn =  '<a href="#" data-routeurl="'.route( 'admin.function.destroy', [$post->id] ).'" data-toggle="tooltip" title="Delete Function" class="btn btn-danger removePost" style="margin-right: 5px;">
                <i class="fas fa-trash"></i></a>&nbsp;';

                $edit_btn = '<a href="'.route( 'admin.function.edit', [$post->id] ).'" data-toggle="tooltip" title="Edit Record" class="btn btn-primary" style="margin-right: 5px;">
				<i class="fas fa-edit"></i> 
				</a>';

                $postArr = [];
                $postArr['sn'] = $i;
                $postArr['title'] = $post->title;
                $postArr['action'] = $delete_btn.' '.$edit_btn.' '.$change_credential;
                $i++;
                $postFunctionListArr[] = $postArr;
            }
        }
        $json_data = array(
            'draw'            => intval( request()->input( 'draw' ) ),
            'recordsTotal'    => intval( $totalRecord ),
            'recordsFiltered' => intval( $totalRecord ),
            'data'            => $postFunctionListArr
        );
        return json_encode( $json_data );
    }
}
