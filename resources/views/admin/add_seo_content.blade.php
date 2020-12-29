@extends('layout.master')
@section('content')
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
                            <a class="btn btn-success" href="<?php echo url("js_admin/seo_management"); ?>">Create New Post</a>
                        </div>
                        <div class="panel-body">
                                <div class="row">
                                <div class="col-lg-12">
                                     <form method="POST" action="<?php echo url("js_admin/save_seo_content"); ?>">
                                     @csrf
                                     <input type="hidden" name="post_id" id="post_id" value="<?php echo $post->id; ?>" />
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Enter Post Title" value="<?php echo $post->page_title; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Meta keyword</label>
                                            <textarea class="form-control" rows="5" placeholder="Meta Keyword" name="meta_key_word" ><?php echo $post->meta_keyword; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" rows="5" placeholder="Meta Description" name="meta_description"><?php echo $post->meta_description; ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save Button</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </form>
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
@push('scripts')
   <script src="{{ url('public/customjs/custom.js') }}"></script>
@endpush      
