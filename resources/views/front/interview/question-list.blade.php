@extends('layout.master')
@section('content')
<style>
.pr_description{ font-weight:400; font-size:16px; line-height:25px; font-family:"Roboto",Helvetica,Arial,sans-serif; }
</style>
<div class="pageBody boxMain">
<div class="container-fluid">
	<div class="col-sm-12 col-md-12 col-lg-12 panel-body">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3 class="titleList">Interview Question</h3>
                <hr />
                @foreach($post_function as $p_action)
                    <div class="col-sm-4">
                        <div class="notice notice-warning ">
                            @php
                                $t_url = $p_action->title_url
                            @endphp
                            <a href="{{url("question/$t_url")}}" style="text-decoration:none;" class="anchor"><p  class="side_title">
                                <?php if(!empty($p_action->title))echo $p_action->title; ?></p>
                            </a>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>
</div>
</div>
@stop

