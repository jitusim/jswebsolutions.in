@extends('layout.master')
@section('content')
@extends('layout.master')
@section('content')
<style>
.pageHeading{ font-size:18px; font-weight:700;}
</style>
<script src="<?php echo url("public/ck-editor/ckeditor/ckeditor.js"); ?>"></script>
<script src="<?php echo url("public/ck-editor/ckfinder/ckfinder.js"); ?>"></script>
<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading">Create New Post </h2>
            </div>
        </div>
    </div>
    </div>
<div class="container-fluid">
<div class="col-sm-12 col-md-3 col-lg-3 padding_20">
		@include('admin.component.side_bar')
	</div>
    <div class="col-sm-12 col-md-9 col-lg-9 padding_20">
        <div class="row">
            @if(Session::has('msg'))
             {!!  Session::get("msg") !!}
             @endif
           <div class="panel-body">
			     <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-default" href="<?php echo url("js_admin/post_function"); ?>">New Post</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-responsive">
                                    <thead>
                                       <tr>
                                         <th>Sn.</th>
                                         <th>Type </th>
                                         <th>Title</th>
                                         <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      	
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
           </div>
		</div>
	</div>
</div>
</div>
@stop  