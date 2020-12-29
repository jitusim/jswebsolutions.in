<div  class="pageBody boxMain">
<div class="container-fluid">
	<div class="col-sm-6 col-md-3 col-lg-3 panel-body">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3 class="titleList">Most Popular PHP Function</h3>
                <hr />
				 <?php 
				 if($post_function != FALSE){
				     foreach($post_function as $p_action){
					    ?>
						<div class="notice notice-warning ">
                           <a href="<?php $t_url = $p_action['title_url']; echo base_url("p/php/$t_url"); ?>" style="text-decoration:none;" class="anchor"><p style="" class="side_title"><?php if(!empty($p_action['title']))echo $p_action['title']; ?></p></a>
                        </div>
						<?php
					  }
				   }
				 ?>
			</div>
		</div>
	</div>
    <div class="col-sm-6 col-md-6 col-lg-6">
		<div class="row panel-body">
           <div class="panel panel-default">
					<div class="panel-body">
					  <div class="row" style="padding:10px;">
                        <div class="col-sm-12">
                          <h1 style="font-size:26px; font-weight:700;"><?php if(!empty($resultPostData['title']))echo $resultPostData['title']; ?></h1>
                          <hr />
                        <div id="pageLoad">
                          <?php 
						   if(!empty($resultPostData['description'])){
							   echo $resultPostData['description'];
							 }
						  ?>
                         </div> 
                        </div>
                      </div>
                    </div>
				</div>
		</div>
	</div>
</div>
</div>

