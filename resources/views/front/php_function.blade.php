
		<div class="panel panel-default">
			<div class="panel-body">
				<h3 class="titleList">Most Popular PHP Functions</h3>
                <hr />
				 <?php 
				 if($post_function != FALSE){
				     foreach($post_function as $p_action){
					    ?>
						<div class="notice notice-warning ">
                           <a href="<?php echo url("php/$p_action->title_url"); ?>" style="text-decoration:none;" class="anchor"><p style="" class="side_title"><?php if(!empty($p_action->title))echo $p_action->title; ?></p></a>
                        </div>
						<?php
					  }
				   }
				 ?>
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
				
		</div>

