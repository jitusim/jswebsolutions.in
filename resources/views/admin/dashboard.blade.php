@extends('layout.master')
@section('content')
<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading">Dashboard </h2>
            </div>
        </div>
    </div>
    </div>
<div class="container-fluid">
    <div class="col-sm-12 col-md-4 col-lg-4 padding_20" style="margin:15px;">
		<div class="row">
           <div class="panel-body">
			   <div class="row panel panel-default padding_div"> 
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="titleList">12</div>
                                    <div class="titleList">Total Post</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo url('js_admin/post') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Click Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>
           </div>
		</div>
	</div>
    <div class="col-sm-12 col-md-4 col-lg-4 padding_20" style="margin:15px;">
		<div class="row">
           <div class="panel-body">
			   <div class="row panel panel-default padding_div"> 
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="titleList">12</div>
                                    <div class="titleList">Create New Post</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo url('js_admin/post') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Click Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>
           </div>
		</div>
	</div>
</div>
</div>
@stop        
