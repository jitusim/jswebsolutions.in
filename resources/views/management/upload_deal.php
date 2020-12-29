 <script src="<?php echo base_url("ck-editor/ckeditor/ckeditor.js"); ?>"></script>
<script src="<?php echo base_url("ck-editor/ckfinder/ckfinder.js"); ?>"></script>
<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading"> Upload Deals </h2>
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
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding_div">
				       	<form id="upload_best_deal">
					<p>
						<div class="form-group">
						    <label>Browse Image</label> 
						   <input type="file" name="image" class="form-control" placeholder="Browse image" id="browse_image" /> 
						</div>
						<div class="form-group">
						    <label>Deal Title</label> 
						   <input type="text" name="title" class="form-control" placeholder="Enter title" id="title" /> 
						    
						</div>
						<div class="form-group">
						 <label>Offers Details</label> 
						<textarea name="myTextarea1" id="myTextarea1"></textarea>
						</div>
						<div class="form-group">
						 <label>Redirect Url</label> 
                          <input type="text" name="redirect_url" class="form-control" placeholder="Redirect Url" id="redirect_url" /> 
						</div>
						<div class="form-group">
						  <button type="text" name="submit" class="btn btn-success"  />Submit </button>
						</div>
					</p>
					<input type="hidden" value="<?php if(!empty($editID)) echo $editID; ?>" name="editID" id="editID" />
                 </form>
                        
					   <div>
                       </div>
			          </div>
                      </div>
                    </div>
				</div>
		</div>
		<div>
			
		</div>
	</div>
</div>
</div>

  
