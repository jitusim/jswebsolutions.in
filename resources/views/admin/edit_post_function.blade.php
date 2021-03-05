@extends('layout.master')
@section('content')
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
                     <a class="btn btn-primary" href="<?php echo url("js_admin/post_function"); ?>">Post List</a>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-lg-12">
                           <form method="post" action="<?php echo url("js_admin/edit_post_function"); ?>">
                              @csrf
                              <input type="text" name="post_edit_id" value="<?php if(!empty($post_function_detail->id))echo $post_function_detail->id; ?>">
                              <p>
                              <div class="form-group">
                                 <label>Blog Subject</label>
                                 <select name="blogSubject" id="blogSubject" class="form-control">
                                    <option hidden="hidden">--Select--Blog--subject--</option>
                                    <option value="1">PHP</option>
                                    <option value="2">Java Script</option>
                                    <option value="3">Jquery</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Title</label> 
                                 <input type="text" name="title" class="form-control" placeholder="Enter title" id="title" value="<?php if(!empty($post_function_detail->title)) echo $post_function_detail->title; ?>" /> 
                              </div>
                              <div class="form-group">
                                 <label>Details</label> 
                                 <textarea id="editor1" name="editor1" rows="5000" cols="1000" style="height:1000px;"><?php if(!empty($post_function_detail->description)) echo $post_function_detail->description; ?></textarea>
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
            </div>
         </div>
      </div>
   </div>
</div>
@stop