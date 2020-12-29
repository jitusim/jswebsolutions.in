@extends('layout.master')
@section('content')
<div  class="pageBody boxMain">
<div class="container">
	<div class="row">
       <div class="col-sm-6 col-md-8 col-lg-8">
		<div class="panel-body">
                     <?php 
					  if($post != FALSE){
						foreach($post as $postArr){
							 $postID = base64_encode($postArr['id']);
							   $title_url = $postArr['title_url'];
						   ?>
						   <div class="row  panel panel-default padding_div"> 
                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				        <h1 class="titleList"><?php if(!empty($postArr['title']))echo $postArr['title']?>&nbsp;</h1>
                        <p class="text-muted postDate">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Js web solutions | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php if(!empty($postArr['updated_at']))echo date("d/m/Y", strtotime($postArr['updated_at'])); ?></p>
						
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
							$did = $postArr['title_url'];
						    ?>
							<a href="<?php echo url("download/$did"); ?>" class="btn btn-default">Download</a>
							<?php
						  }
					     ?>
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
                     {{ $post->links() }}
					</div>
       </div>
         <div class="col-sm-6 col-md-4 col-lg-4">
           <div class="panel-body">
             @include('front.component.tags') 
            @include('front.component.php_function')
            @include('front.component.ads')  
           </div>
         </div>
	</div>
</div>
</div>
@stop