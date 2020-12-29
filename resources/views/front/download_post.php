<div  class="pageBody boxMain">
<div class="container">
	<div class="col-sm-6 col-md-8 col-lg-8">
		<div class="row">
           <div class="">
					<div class="panel-body">
					  <div class="row panel panel-default padding_div"> 
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding_div">
				          <p class="text-center side_titleList"><?php if($post_result['title']){ echo $post_result['title'];  } ?></p>
				       <div>
                       </div>
			          </div>
			          
			          <div class="text-center">
			              <button type="button" class="btn btn-success download_button" data-downloadurl="<?php if($post_result['downloadUrl']){ echo $post_result['downloadUrl'];  } ?>">Download</button>
			          </div>
			          <div id="download_response"></div>
                      </div>
                    </div>
				</div>
		</div>
		<div>
			
		</div>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-4 panel-body">
		 <?php $this->load->view('front/newsletter'); ?>
	</div>
</div>
</div>
