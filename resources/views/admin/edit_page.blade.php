@extends('layout.master')
@section('content')
<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading">Create New Page </h2>
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
                            <a class="btn btn-primary" href="<?php echo url("js_admin/post"); ?>">Post List</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo url("js_admin/edit_page") ?>" method="post">
                                    @csrf
                                        <input type="hidden" name="page_id" id="page_id" value="<?php if(!empty($page_content->id)) echo $page_content->id; ?>" readonly>
                                        <div class="form-group">
                                            <label>Select Parent page </label>
                                              <select class="form-control" name="parent_id" id="">
                                                @foreach($pageList as $page)
                                                <option value="<?php echo $page->id; ?>" <?php if(!empty($page_content->parent_id)) if($page_content->parent_id == $page->id) echo "selected"; ?>><?php echo $page->page_name; ?></option>
                                                @endforeach
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Name</label>
                                            <input type="text" name="page_name" id="page_name" class="form-control" required="required" placeholder="Page Name" value="@if($page_content->page_name){{ $page_content->page_name }}@endif" />
                                        </div>
                                        <div class="form-group">
                                            <label>Page title</label>
                                            <textarea class="form-control" rows="5" placeholder="Title" name="page_title" >@if(!empty($page_content->page_title)){{ $page_content->page_title }}@endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <textarea class="form-control" rows="5" placeholder="Meta Keyword" name="meta_keyword" >@if($page_content->meta_key_word){{ $page_content->meta_key_word }}@endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta description</label>
                                            <textarea class="form-control" rows="5" placeholder="Post Description" name="meta_description" >@if($page_content->meta_description){{ $page_content->meta_description }}@endif</textarea>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
           </div>
		</div>
	</div>
</div>
</div>
@stop        
