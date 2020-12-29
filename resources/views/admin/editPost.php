<?php $blogType = array(1=>"PHP",2=>"Javascript",3=>"jQuery",4=>"Angular Js"); ?>
<style>
.pageHeading{ font-size:18px; font-weight:700;}
</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header pageHeading ">Edit Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
				if(isset($success)){
			     ?>
                       <p class="alert alert-success" style="padding:10px;">
                    Record Edit Successfully... <strong>!!!</strong>
                    </p>
                 <?php 
			     }
                if(validation_errors()) {
				echo '<div class="alert alert-danger">
		    	          <p class="">'.validation_errors().'</p>
			          </div>';
			  }
              ?>  
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-primary" href="<?php echo base_url("admin/uploadPostList"); ?>">Post List</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                     <?php echo form_open_multipart(""); ?>
                                        <div class="form-group">
                                        <input type="hidden" name="editID" id="editID" value="<?php if(!empty($editID))echo $editID; ?>" required="required" />
                                            <label>Blog Subject</label>
                                             <select name="blogSubject" id="blogSubject" class="form-control">
                                             <?php 
											  if(!empty($postData['blogType'])){
												  ?>
												    <option value="<?php echo $postData['blogType']; ?>"><?php echo $blogType[$postData['blogType']]; ?></option>
												  <?php
												 }
											 ?>
                                            <option hidden="hidden">--Select--Blog--subject--</option>
                                             <option value="1">PHP</option>
                                              <option value="2">Java Script</option>
                                               <option value="3">Jquery</option>
                                                <option value="4">Html Template</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Enter Post Title" value="<?php 
											  if(!empty($postData['title'])){
												   echo $postData['title'];
												 } ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Demo url</label>
                                            <input type="text" name="demourl" id="demourl" class="form-control"  placeholder="Paste demo url" value="<?php 
											  if(!empty($postData['demoUrl'])){
												   echo $postData['demoUrl'];
												 } ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Download Url</label>
                                            <input type="text" name="downloadurl" id="downloadurl" class="form-control" placeholder="Paste download Url" value="<?php 
											  if(!empty($postData['downloadUrl'])){
												   echo $postData['downloadUrl'];
												 } ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="hidden" name="postImageCopy" id="postImageCopy" value="<?php if(!empty($postData['image'])){  echo $postData['image']; } ?>" />
                                            <input type="file" class="form-control"  name="postImage" id="postImage" />
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
                                            <textarea class="form-control" rows="5" placeholder="Post Description" name="descripttion" ><?php if(!empty($postData['description'])){  echo $postData['description']; } ?></textarea>
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