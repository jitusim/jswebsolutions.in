@extends('layout.master')
@section('content')
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<link href="<?php echo url("public/customjs/editor_css.css") ?>" type="text/css" rel="stylesheet" />
<div  class="pageBody boxMain">
<div class="container-fluid">
	<div class="row">
      	<div class="col-sm-12 col-md-8 col-lg-8">
           <div class="panel panel-default">
					<div class="panel-body">
						@if($resultPostData != NULL)
						<div class="col-sm-12">
							<h1 style="font-size:26px; font-weight:700;">
								{{ $resultPostData->title ?? "N/A"}}
							</h1>
							<hr />
							<input type="hidden" name="listedPage" id="listedPage" value="<?php if(!empty($resultPostData->id))echo $resultPostData->id;  ?>" /> 
							<div id="pageLoad">
								@if($pageLinked != FALSE)
								<?php include $pageLinked;  ?> 
								@else
								<div class="panel-body">
									<?php
										if(!empty($resultPostData->demoUrl)){
											?>
											<a target="_blank" href="<?php echo $resultPostData->demoUrl; ?>" class="btn btn-default">See Demo</a>
											<?php
										}
									?>
									<?php
										if(!empty($resultPostData->downloadUrl)){
											?>
											<a  href="<?php echo url("download_post/$resultPostData->title_url"); ?>" class="btn btn-default">Download</a>
											<?php
										}
									?>
								</div>  
								@endif    
							</div> 
						</div>
						@else
						<h1 style="font-size:26px; font-weight:700;">Content not available related to this post !!!</h1>
						@endif
                    </div>
		   </div>
		</div>
      <div class="col-sm-6 col-md-4 col-lg-4">
         @include('front.component.index_ads')    
         @include('front.component.tags')
	</div>
    </div>
</div>
</div>
<?php 
if(!empty($resultPostData->demoUrl)){
   ?>
   <div  class="pageBody boxMain">
<div class="container-fluid">
	<div class="col-sm-6 col-md-9 col-lg-9">
		<div class="row panel-body">
           <div class="panel panel-default">
					<div class="panel-body">
					  <?php
					    if(!empty($resultPostData->demoUrl)){
					        ?>
					         <a target="_blank" href="<?php echo $resultPostData->demoUrl; ?>" class="btn btn-default">See Demo</a>
					        <?php
					    }
					  ?>
					  <?php
					    if(!empty($resultPostData->downloadUrl)){
					        $id = $resultPostData->id;
					        ?>
					         <a  href="<?php echo url("download_post/$resultPostData->title_url"); ?>" class="btn btn-default">Download</a>
					        <?php
					    }
					  ?>
                    </div>
				</div>
		</div>
	</div>
</div>
</div>
   <?php 
}
?>
@stop