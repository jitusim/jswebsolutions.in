@extends('layout.master')
@section('content')
<style>
.nav-sidebar { 
    width: 100%;
    padding: 8px 0; 
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
    -webkit-border-radius: 4px 0 0 4px; 
    -moz-border-radius: 4px 0 0 4px; 
    border-radius: 4px 0 0 4px; 
}
.nav-sidebar .active a { 
    cursor: default;
    background-color: #428bca; 
    color: #fff; 
    text-shadow: 1px 1px 1px #666; 
}
.nav-sidebar .active a:hover {
    background-color: #428bca;   
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis; 
}

/* Right-aligned sidebar */
.nav-sidebar.pull-right { 
    border-right: 0; 
    border-left: 1px solid #ddd; 
}
.nav-sidebar.pull-right a {
    -webkit-border-radius: 0 4px 4px 0; 
    -moz-border-radius: 0 4px 4px 0; 
    border-radius: 0 4px 4px 0; 
}
</style>
<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading">Post List </h2>
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
                            <a class="btn btn-success" href="<?php echo url("js_admin/create_post"); ?>">Create New Post</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <table class="table table-responsive">
                                    <thead>
                                       <tr>
                                         <th>Sn.</th>
                                         <th>Page Title</th>
                                         <th>Status</th>
                                         <th colspan="2">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
									   if($pageList != FALSE){
										   $i=1; 
										 foreach($pageList as $postArr){
											?>
										   <tr>
                                            <th><?php if(!empty($postArr->id))echo $postArr->id; ?></th>
                                            <td><?php if(!empty($postArr['title']))echo $postArr['title']; ?></td>
                                             <th><?php if(!empty($postArr['deleted_at'])) echo "Deleted"; else echo "Active"; ?></th>
                                            <th><a href="<?php $id = base64_encode($postArr['id']); echo url("js_admin/edit_post/$id"); ?>" class="">Edit</a>
                                            &nbsp;
                                            <a class="remove_post"  href="javascript::void()" data-postid="<?php echo $postArr['id']; ?>" class="btn btn-default">Delete</a>
                                            </th>
                                      </tr>
										    <?php 
										   $i++;	   
										  }
										}
									   else{
										  ?>
										  <tr>
                                           <td colspan="4">No Record found</td>
                                          </tr>
										  <?php
										}	
									  ?>
                                    </tbody>
                                  </table>   
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    {{ $pageList->links() }} 
                    </div>
           </div>
		</div>
	</div>
</div>
</div>
@stop 
@push('scripts')
   <script src="{{ url('public/customjs/custom.js') }}"></script>
@endpush      
