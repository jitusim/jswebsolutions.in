<style>
.pageHeading{ font-size:18px; font-weight:700;}
</style>
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
				if(isset($success)){
			     ?>
                       <p class="alert alert-success" style="padding:10px;">
                       Page Create Successfully... <strong>!!!</strong>
                    </p>
                    <script>setTimeout(function(){ location.reload(); } , 1000);</script>
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
                            <a class="btn btn-primary" href="<?php echo base_url("pageList"); ?>">All Page List</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                     <?php echo form_open_multipart(""); ?>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="hidden" name="post_id" id="post_id" value="<?php if(!empty($post_id))echo $post_id; ?>" readonly />
                                            <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Enter Post Title" />
                                        </div>
                                        <div class="form-group">
                                            <label>Page Description [SEO skills needed]
</label>
                                            <textarea class="form-control" rows="5" placeholder="
Page Description [SEO skills needed]" name="descripttion" ></textarea>

<small>(In 160 words maximum, your website's description
for search engines. Wrong entry could harm
your website's visibility on search engines.)</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Keywords [SEO skills needed]
</label>
                                             <textarea class="form-control" rows="5" placeholder="
Page Keywords [SEO skills needed]
" name="keyword" ></textarea>
<small>(In 160 words maximum, your website's keywords
for search engines. Wrong entry could harm
your website's visibility on search engines.)</small>
                                        </div>
                                        <button type="submit" class="btn btn-success">Post Button</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
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