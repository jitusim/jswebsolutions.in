<div class="row panel panel-default padding_div">
			<div class="panel-body">
				<h3 class="titleList">Popular Post</h3>
                <hr />
				 <?php
			      $i=1;
				  foreach($posts as $postListArr){
				        $title_url = $postListArr->title_url;
				        if( $i == 4){ break; }
				       ?>
				       <div>
                        <p class="side_titleList"><?php if($postListArr->title){ echo $postListArr->title;  } ?></p>
                        <p class="text-muted postDate">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                         <?php echo sHelper::get_user_detail($postListArr->user_id); ?>                         | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                         <?php if(!empty($postListArr->updated_at))echo date("d/m/Y", strtotime($postListArr->updated_at)); ?>
                        </p>
                        <?php
                          if(!empty($postListArr->title_url)){
                             ?>
                             <a class="postDate anchortag" href="<?php echo url("blogPost/$title_url"); ?>">Read More</a>
                             <?php  
                          } 
                        ?>
                       </div>
                        <hr>
				       <?php    
				     $i++;
				    } 
				 ?> 
			</div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-4152597108794624"
     data-ad-slot="5543019886"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
		</div>