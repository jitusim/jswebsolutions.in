@extends('layout.master')
@section('content')
<div class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading"> Contact us </h2>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
	    <div class="col-sm-6 col-md-8 col-lg-8">
		      <div class="panel-body">
					  <div class="row panel panel-default padding_div"> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				        	<form role="form" id="contactForm" class="contact-form" autocomplete="off">
				       	    @csrf
                    <div class="row">
                		<div class="col-md-6">
                  		<div class="form-group">
                            <input type="text" class="form-control" name="name" autocomplete="off" id="name" placeholder="Name" />
                  		</div>
                  	</div>
                    	
                  	</div>
                  	<div class="row">
                		<div class="col-md-6">
                  		<div class="form-group">
                            <input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="E-mail" />
                  		</div>
                  	</div>
                  	</div>
                  	<div class="row">
                  		<div class="col-md-12">
                  		<div class="form-group">
                            <textarea class="form-control textarea" rows="3" name="message" id="Message" placeholder="Message" style="height:200px;"></textarea>
                  		</div>
                  	</div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    <div id="responseMsg"></div>        
                  <button type="submit" id="contactMsgbtn" class="btn main-btn pull-right">Send message</button>
                  </div>
                  </div>
                </form>
					   <div>
                       </div>
			          </div>
                      </div>
                    </div>
	    </div>
    	
        <div class="col-sm-4">
          <div class="panel-body">
           @include('front.component.contact_number') 
          </div>
     </div>
    </div>
</div>
@stop
