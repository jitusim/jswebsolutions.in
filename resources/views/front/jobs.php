<div  class="pageBody boxMain">
<div class="container">
	<div class="col-sm-6 col-md-8 col-lg-8">
		<div class="row">
           <div>
					<div class="panel-body">
                     <?php 
					  if($post != FALSE){
						foreach($post as $postArr){
							 $postID = base64_encode($postArr['id']);
							   $title_url = $postArr['title_url'];
						   ?>
						   <div class="row  panel panel-default padding_div"> 
                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				        <h3 class="titleList"><?php if(!empty($postArr['title']))echo $postArr['title']?>&nbsp;</h3>
                        <p class="text-muted postDate">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php if(!empty($postArr['postedBy']))echo $postArr['postedBy']?> | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php if(!empty($postArr['crEditdate']))echo date('d/m/Y',$postArr['crEditdate']); ?></p>
						
						<div>
                          <?php 
						  if(!empty($postArr['demoUrl'])){
							   ?>
							   <a target="_blank" href="<?php echo $postArr['demoUrl']; ?>" class="btn btn-default">Demo</a>
							   <?php
							 }
						  ?>
                        <?php 
					    if(!empty($postArr['downloadUrl'])){
						    ?>
							<a href="<?php echo base_url("blogPost/").base64_encode($postArr['id']); ?>" class="btn btn-default">Download</a>
							<?php
						  }
					     ?>
                         	<a target="_blank" href="<?php echo base_url("blogPost/").$title_url; ?>" class="btn btn-default">Read more...</a>
					 <ul class="shareListing">
                         <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=http://jswebsolutions.in/blogPost/<?php echo $title_url; ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                          <li><a href="https://plus.google.com/share?url=http://jswebsolutions.in/blogPost/<?php echo $title_url; ?>" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                       </ul>
                       </div>
			          </div>
                      </div>
                          
						   <?php
						 }
					   }
					 ?> 
					</div>
				</div>
		</div>
	</div>
</div>
</div>
