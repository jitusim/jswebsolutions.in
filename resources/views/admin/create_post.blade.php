@extends('layout.master')
@section('content')
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
                            <a class="btn btn-primary" href="<?php echo url("js_admin/post"); ?>">Post List</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo url("js_admin/save_post") ?>" method="post">
                                    @csrf
                                        <div class="form-group">
                                            <label>Select page</label>
                                             <select name="blogSubject" id="blogSubject" class="form-control">
                                            <option hidden="hidden">--Select--page--</option>
                                              @foreach($pages as $page)
                                                 <option value="{{ $page->page_slug }}">{{ $page->page_name }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Enter Post Title" value="{{ old('title') }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Demo url</label>
                                            <input type="text" name="demourl" id="demourl" class="form-control" placeholder="Paste demo url" value="{{ old('title') }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Download Url</label>
                                            <input type="text" name="downloadurl" id="downloadurl" class="form-control"  placeholder="Paste download Url" />
                                        </div>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" class="form-control"  name="postImage" id="postImage"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Paid status</label>
                                            <select name="paidstaus" id="paidstaus" class="form-control">
                                             <option value="1">Free</option>
                                              <option value="2">Paid</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Text area</label>
                                            <textarea class="form-control" rows="5" placeholder="Post Description" name="descripttion" ></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Post Button</button>
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
