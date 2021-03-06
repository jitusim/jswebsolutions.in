@extends('layout.master')
@section('content')
<div  class="pageBody boxMain">
<div class="container">
	<div class="col-sm-6 col-md-8 col-lg-8">
		<div class="row">
           <div >
					<div class="panel-body">
					  <?php
                       if($post != FALSE){
						  foreach($post as $postArr){
						       $postID = base64_encode($postArr['id']);
						        $title_url = $postArr['title_url'];
							 ?>
						   <div class="row panel panel-default padding_div"> 
                       <?php
                         if(!empty($postArr['image'])){
							 $image = $postArr['image'];
						    ?>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				        <img src="<?php echo url("public/uploadsFiles/postImage/$image"); ?>" alt="create , Insert ,update,delete Opearation" class="img-thumbnail img-responsive">
			          </div>
							<?php
						  }
					   ?>
                       <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				        <h1 class="titleList"><?php if(!empty($postArr['title']))echo $postArr['title']; ?></h1>
                        <p class="text-muted postDate">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php if(!empty($postArr['postedBy']))echo $postArr['postedBy']?> | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php if(!empty($postArr['crEditdate']))echo date("d/m/Y",$postArr['crEditdate']); ?></p>
						<p class="postDescription"><?php if(!empty($postArr['description'])) echo $postArr['description']; ?> [...]</p>
					   <div>
                          <a target="_blank" href="<?php echo url("blogPost/$title_url"); ?>" class="btn btn-default">Read more...</a>
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
@stop