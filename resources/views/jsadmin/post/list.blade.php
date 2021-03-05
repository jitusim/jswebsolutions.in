@extends('jsadmin.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active">Post List </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          @if(Session::has('msg'))
              {!!  Session::get("msg") !!}
          @endif
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post List</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-bordered table-striped" id="user-list">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
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
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop
@section('customscript')
 @parent
<script>
$(document).ready(function(e) {
$('#user-list').DataTable({
	"processing": true,
	"serverSide": true,
  "sScrollX": "100%",
  "sScrollXInner": "110%",
  "bScrollCollapse": true,
	"ajax":{
			 "url": "{{ route('admin.ajax-post-list') }}",
			 "dataType": "json",
			 "type": "GET",
			 "data":function(d){
			    d.roles = $("#roles").val();
			 },
		   },
	"columns": [
		{ data:'sn',orderable:false},
        { data:'title'},
	    { data:'action',orderable:false},
	],
	'columnDefs': [ {
		'targets': [0], /* column index */
		'orderable': false, /* true or false */
	}]	 
}); 


/*roles on change*/	
$(document).on('change','#roles',function(e){
   e.preventDefault();
   $('#user-list').DataTable().draw(true);
});
/*End*/

$(document).on('click','.removePage',function(e){
  var con = confirm('Are you sure want to delete this page !!!');
  if(con == true){
    var postid = $(this).data('postid');
    url = "{{ route("admin.post.delete-post",['__postid__']) }}";
    deleteUrl = url.replace('__postid__',postid);
    //console.log(deleteUrl);
    window.location.href = deleteUrl;
  }
   //e.preventDefault();
   //$('#user-list').DataTable().draw(true);
});
/*End*/
});
</script>
@endsection
