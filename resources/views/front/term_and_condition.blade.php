@extends('layout.master')
@section('content')
<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading"> Term &amp; Condition </h2>
            </div>
        </div>
    </div>
    </div>
<div class="container">
	<div class="col-sm-6 col-md-8 col-lg-8">
		<div class="row">
           <div class="">
					<div class="panel-body">
					  <div class="row panel panel-default padding_div"> 
                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				        <p class="postDescription">
				          1) JSWEBSOLUTIONS provide free to use script and tutorials as learning and personal purpose . 
				          <br />
				          <br />
				          2) If any person required for any script to related website technology just like as HTML , CSS , Bootstrap , jQuery , javascript , PHP , MySql then send query by mail info@jswebsolutions.in And person must be a user and subscriber on portal .
				          <br /><br />
				          
				          3) Don't be republish our tutorials , script , demo on other website .
				        </p>
					   <div>
                       </div>
			          </div>
                      </div>
                    </div>
				</div>
		</div>
		
	</div>
	<div class="col-sm-6 col-md-4 col-lg-4 panel-body">
			@include('front.component.newsletter')
        @include('front.component.php_function')
	</div>
</div>
</div>
@stop