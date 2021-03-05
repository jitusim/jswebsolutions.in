@extends('jsadmin.layouts.master')
@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"> </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active">Add Post </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Create New Post</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                      @if(Session::has('msg'))
                        {!!  Session::get("msg") !!}
                      @endif
                        <form action="{{ route("admin.save-post")}}" method="post">
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
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop
