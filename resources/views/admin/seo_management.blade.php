@extends('layout.master')
@section('content')
<style>
.pageHeading{ font-size:18px; font-weight:700;}
</style>
<script src="<?php echo url("public/ck-editor/ckeditor/ckeditor.js"); ?>"></script>
<script src="<?php echo url("public/ck-editor/ckfinder/ckfinder.js"); ?>"></script>

<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading">Create New Post </h2>
            </div>
        </div>
    </div>
    </div>
<div class="container-fluid">
<div class="col-sm-12 col-md-3 col-lg-3 padding_20">
		@include('admin.component.side_bar')
	</div>
    <div class="col-sm-12 col-md-9 col-lg-9 padding_20">
        <div class="row">
            @if(Session::has('msg'))
             {!!  Session::get("msg") !!}
             @endif
           <div class="panel-body">
			     <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-default" href="<?php echo url("js_admin/add_seo_page"); ?>">Add New Seo Page</a>
                        </div>
                        
                        <div class="panel-body">
                        <form>
                        <div class="row">
                          <div class="col-sm-12">
                             <div class="form-group">
                              <input type="text" class="form-control" id="search_url" name="search_url" placeholder="Paste and search url" />
                             </div> 
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                             <button type="button" id="search_url_btn" class="btn btn-default">Search</button>
                            </div>
                          </div>
                        </div>
                        </form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-striped" id="users-table">
                    <thead>
                        <tr>
                          <th>SN</th>
                          <th>Url</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
           </div>
		</div>
	</div>
</div>
</div>
@stop  
@section('script')
 @parent
 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(e) {
   $('#users-table').DataTable({
    serverSide: true,
    ajax:{
		 "url": "{{ url('js_admin/seo_management_list') }}",
		 "data":function(d){
			d.search_url = $('#search_url').val();
          },
	},
    columns: [
        { data:'sn'},
        { data:'url'},
        { data:'action' },
    ],
	}); 
	
	/*Search parts list click on button*/
	$(document).on('click','#search_url_btn' , function(e){
	   e.preventDefault();
	   $('#users-table').DataTable().draw(true);
    });
	/*End*/
});
</script>
@endsection