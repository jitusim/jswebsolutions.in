<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;
use sHelper;
use DB;

class DashboardController extends Controller {

    public function index() {
        $data['title'] = 'admin dashboard | jswebsolutions.in';
        
        return view( 'jsadmin.home' )->with( $data );
    }

    public function create() {
        $data['title'] = 'admin dashboard | jswebsolutions.in';
        $data['pageList'] = sHelper::parentPages();

        return view( 'jsadmin.page.create' )->with( $data );
    }

    public function pages() {
        $data['title'] = 'admin dashboard | jswebsolutions.in';
        return view( 'jsadmin.page.list' )->with( $data );
    }

    public function pageList( Request $request ) {
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
        $pageQuery = Pages::query();
        $totalRecord = $pageQuery->count();
        $pages = $pageQuery->skip( $start )->take( $limit )->get();
        $partners_lists = [];
        if ( $pages->count() > 0 ) {
            $i = 1;
            foreach ( $pages as $page ) {
                $change_credential = NULL;

                $delete_btn =  "<a href='javascript::void()' data-pageid='".$page->id."' data-toggle='tooltip' title='Add category' class='btn btn-danger removePage' style='margin-right: 5px;'><i class='fas fa-trash'></i></a>&nbsp;";

                $edit_btn = '<a href="'.url( 'dashboard/edit-page/'.$page->id ).'" data-toggle="tooltip" title="Edit Record" class="btn btn-primary" style="margin-right: 5px;">
				<i class="fas fa-edit"></i> 
				</a>';

                $postArr = [];
                $postArr['sn'] = $i;
                $postArr['title'] = $page->page_name;
                $postArr['action'] = $delete_btn.' '.$edit_btn.' '.$change_credential;
                $i++;
                $partners_lists[] = $postArr;
            }
        }
        $json_data = array(
            'draw'            => intval( request()->input( 'draw' ) ),
            'recordsTotal'    => intval( $totalRecord ),
            'recordsFiltered' => intval( $totalRecord ),
            'data'            => $partners_lists
        );
        return json_encode( $json_data );
        exit;
    }

    public function savePage( Request $request ) {
        if ( !empty( $request->page_name ) ) {
            $page_slug_name = sHelper::slug( $request->page_name );
            $save_response = DB::table( 'page' )->insert( ['parent_id'=>$request->parent_id, 'page_slug'=>$page_slug_name, 'page_title'=>$request->page_title, 'page_name'=>$request->page_name, 'priority'=>1, 'status'=>'A' ,
            'meta_key_word'=>$request->meta_keyword, 'meta_description'=>$request->meta_description, 'created_at'=>date( 'Y-m-d H:i' ), 'updated_at'=>date( 'Y-m-d H:i' )] );
            if ( $save_response ) {
                return redirect()->back()->with( ['msg'=>'<div class="notice notice-success">
                                           <strong>Success </strong> Page create Successful !!!.</div>.'] );
            } else {
                return redirect()->back()->with( ['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Something went wrong , please try again  !!!.</div>.'] );
            }

        } else {
            return redirect()->back()->with( ['msg'=>'<div class="notice notice-danger">
                                           <strong>Wrong </strong> Page name is required !!!.</div>.'] );

        }

    }
}
