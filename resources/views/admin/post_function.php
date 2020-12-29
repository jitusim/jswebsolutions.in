<style>
.pageHeading{ font-size:18px; font-weight:700;}
</style>
<script src="<?php echo base_url("ck-editor/ckeditor/ckeditor.js"); ?>"></script>
<script src="<?php echo base_url("ck-editor/ckfinder/ckfinder.js"); ?>"></script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header pageHeading ">Create New Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
				if(isset($success_status)){
			     ?>
                   <p class="alert alert-success" style="padding:10px;">
                      Post Create successful... <strong>!!!</strong>
                    </p>
                   
                 <?php 
			     }
                if(validation_errors()) {
				echo '<div class="alert alert-danger">
		    	          <p class="">'.validation_errors().'</p>
			          </div>';
			  }
              ?>  
                <div class="col-lg-12" style="margin-bottom:50px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-primary" href="<?php echo base_url("admin/post_function_list"); ?>">All Page List</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                     <form name="postfunction" method="post" action="">
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
						   <input type="text" name="title" class="form-control" placeholder="Enter title" id="title" /> 
						    
						</div>
						<div class="form-group">
						 <label>Details</label> 
						<textarea id="editor1" name="editor1" rows="100" cols="100"></textarea>
						</div>
						<div class="form-group">
						  <button type="text" name="submit" class="btn btn-success"  />Submit </button>
						</div>
					</p>
					<script type="text/javascript">
					var editor = CKEDITOR.replace( 'editor1', {
						filebrowserBrowseUrl : '<?php echo base_url(); ?>ck-editor/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : '<?php echo base_url(); ?>ck-editor/ckfinder/ckfinder.html?type=Images',
						filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html?type=Flash',
						filebrowserUploadUrl : '<?php echo base_url(); ?>ck-editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : '<?php echo base_url(); ?>ck-editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : '<?php echo base_url(); ?>ck-editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});
					CKFinder.setupCKEditor( editor, '../' );
					</script>
					<input type="hidden" value="<?php if(!empty($editID)) echo $editID; ?>" name="editID" id="editID" />
                 </form>
                 
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>