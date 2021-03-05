@extends('layout.master')
@section('content')
<style>
.pr_description{ font-weight:400; font-size:16px; line-height:25px; font-family:"Roboto",Helvetica,Arial,sans-serif; }
</style>
<div class="pageBody boxMain">
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
                           <a href="<?php $t_url = $p_action->title_url; echo url("php_codes/$t_url"); ?>" style="text-decoration:none;" class="anchor"><p  class="side_title"><?php if(!empty($p_action->title))echo $p_action->title; ?></p></a>
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
					  <div class="row">
                        <div class="col-sm-12">
                          <h1 class="heading_h1"><?php if(!empty($post_details->title))echo $post_details->title; ?></h1>
                          <hr />
                           <div class="pr_description"> 
                            <p>
                               <?php 
							   if(!empty($post_details->description)){
								   echo $post_details->description;
								 }
							   ?>
                            </p>
                           </div> 
                        </div>
                      </div>
                    </div>
				</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3 col-lg-3 panel-body">
         @include('front.component.ads') 
	</div>
</div>
</div>
@stop

