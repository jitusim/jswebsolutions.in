@extends('layout.master')
@section('content')
<style>
.pageHeading{ font-size:18px; font-weight:700;}
</style>
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
                            <a class="btn btn-default" href="<?php echo url("js_admin/create_page"); ?>">Create New page</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-responsive">
                                    <thead>
                                       <tr>
                                         <th>Sn.</th>
                                         <th>Page Title</th>
                                         <th>Meta key word</th>
                                         <th>Meta Description</th>
                                         <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
										 @forelse($pageList as $postArr)
										   <tr>
                                            <th><?php echo $loop->iteration; ?></th>
                                            <td><?php if(!empty($postArr->page_name))echo $postArr->page_name; ?></td>
                                            <td><?php if(!empty($postArr->meta_key_word))echo $postArr->meta_key_word; ?></td>
                                            <td><?php if(!empty($postArr->meta_description))echo $postArr->meta_description; ?></td>
                                            <th><a href="<?php echo url("js_admin/edit_page/$postArr->page_slug"); ?>" class="btn btn-default">Edit</a></th>
                                      </tr>
									     @empty{
										  <tr>
                                           <td colspan="4">No Record found</td>
                                          </tr>
										 @endforelse
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