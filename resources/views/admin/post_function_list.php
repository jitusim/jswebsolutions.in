<style>
.pageHeading{ font-size:18px; font-weight:700;}
</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header pageHeading ">Upload Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-primary" href="<?php echo base_url("admin/post_function"); ?>">Create Page</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  <table class="table table-responsive">
                                    <thead>
                                       <tr>
                                         <th>Sn.</th>
                                         <th>Type </th>
                                         <th>Title</th>
                                         <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
									   if($post_function_list != FALSE){
										   $i=1; 
										 foreach($post_function_list as $postArr){
											?>
										   <tr>
                                            <th><?php if(!empty($i))echo $i; ?></th>
                                            <td><?php if(!empty($postArr['subject_type']))echo $postArr['subject_type']; ?></td>
                                            <td><?php if(!empty($postArr['title']))echo $postArr['title']; ?></td>
                                           <th><a href="<?php $id = base64_encode($postArr['id']); echo base_url("admin/editpost_function?id=$id"); ?>" class="btn btn-primary">Edit</a></th>
                                      </tr>
										    <?php 
										   $i++;	   
										  }
										}
									   else{
										  ?>
										  <tr>
                                           <td colspan="4">No Record found</td>
                                          </tr>
										  <?php
										}	
									  ?>
                                    </tbody>
                                  </table>   
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