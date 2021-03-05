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
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Main row -->
         @if(Session::has('msg'))
         {!!  Session::get("msg") !!}
         @endif
         <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
               <!-- MAP & BOX PANE -->
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Add Post</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form name="postfunction" method="post" action="{{ route('admin.function.store') }}">
                        @csrf
                        <p>
                        <div class="form-group">
                           <label>Blog Subject</label>
                           <select name="blogSubject" id="blogSubject" class="form-control">
                           {!!$pages!!}
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Title</label> 
                           <input type="text" name="title" class="form-control" placeholder="Enter title" id="title" /> 
                        </div>
                        <div class="form-group">
                           <label>Details</label> 
                           <textarea id="editor1" name="editor1" rows="5000" cols="1000" style="height:1000px;"></textarea>
                        </div>
                        <div class="form-group">
                           <button type="text" name="submit" class="btn btn-success"  />Submit </button>
                        </div>
                        </p>
                        <script type="text/javascript">
                           var editor = CKEDITOR.replace( 'editor1', {
                           	filebrowserBrowseUrl : '<?php echo url("ck-editor/ckfinder/ckfinder.html"); ?>',
                           	filebrowserImageBrowseUrl : '<?php echo url("public/ck-editor/ckfinder/ckfinder.html?type=Images"); ?>',
                           	filebrowserFlashBrowseUrl : '<?php echo url("public/ckfinder/ckfinder.html?type=Flash"); ?>',
                           	filebrowserUploadUrl : '<?php echo url("ck-editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"); ?>',
                           	filebrowserImageUploadUrl : '<?php echo url("ck-editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images"); ?>',
                           	filebrowserFlashUploadUrl : '<?php echo url("ck-editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"); ?>'
                           });
                           CKFinder.setupCKEditor( editor, '../' );
                        </script>
                        <input type="hidden" value="<?php if(!empty($editID)) echo $editID; ?>" name="editID" id="editID" />
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!--/. container-fluid -->
   </section>
   <!-- /.content -->
</div>
@stop
@section('customcss')
@parent
<script src="<?php echo url("public/ck-editor/ckeditor/ckeditor.js"); ?>"></script>
<script src="<?php echo url("public/ck-editor/ckfinder/ckfinder.js"); ?>"></script>
@endsection