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
                            <a class="btn btn-primary" href="<?php echo base_url("addPages"); ?>">Create Page</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  <table class="table table-responsive">
                                    <thead>
                                       <tr>
                                         <th>Sn.</th>
                                         <th>Page Title</th>
                                         <th>Title</th>
                                         <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
									   if($pageList != FALSE){
										   $i=1; 
										 foreach($pageList as $postArr){
											?>
										   <tr>
                                            <th><?php if(!empty($i))echo $i; ?></th>
                                            <td><?php if(!empty($postArr['title']))echo $postArr['title']; ?></td>
                                            <td><?php if(!empty($postArr['pageDescription']))echo $postArr['pageDescription']; ?></td>
                                            <td><?php if(!empty($postArr['pageKeyword']))echo $postArr['pageKeyword']; ?></td>
                                            <th><a href="<?php $id = base64_encode($postArr['id']); echo url("js_admin/add_seo_content/$id="); ?>" class="">FOR SEO</a></th>
                                           <th><a href="<?php $id = base64_encode($postArr['id']); echo base_url("editpage/$id"); ?>" class="btn btn-primary">Edit</a></th>
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