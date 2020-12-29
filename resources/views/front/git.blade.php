@extends('layout.master')
@section('content')
<style>
.pr_description{ font-weight:400; font-size:18px; line-height:25px; font-family:"Roboto",Helvetica,Arial,sans-serif; }
</style>
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<link href="<?php echo url("public/customjs/editor_css.css") ?>" type="text/css" rel="stylesheet" />
<div  class="pageBody boxMain">
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-9 col-lg-9">
			<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-sm-12">
							 <h1 class="heading_h1">GIT & GITHUB</h1>
							<hr />
							<div id="pageLoad">
							<div class="pr_description"> 
							<p>
								Git is a Version Control. Which invented by <strong> Linus Torvalds </strong> . Git is a software tool that is used to track changes in files. Git is version Control . Below we have show listed most useful command of GIT . 
							</p>
							<p>
								For the Start using of Git . we have to create a account in Github Website . After that we will learn about how to use of GIT and GITHUB. Click the below ling and create or login in Github Website <br />
								<a target="_blank"href="https://github.com/">https://github.com/</a>  <br />
								
							</p>
							<p>
								When You complete the registration of GITHUB . After that you have to install GITBASH in our local machine . 
								Here I want to tell you . You can use GITHUB GUI or GITBASH or else BOTH . As per Convenience . But Here I will use of GITBASH . 
								Here we have listed most useful command of GIT . These command you have to run on GITBASH before start the work and after close the work . 
							</p>
</div>
</div>
<div class="panel-body">
<div class="col-sm-8" style="box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 780px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;">
<div style="box-sizing: border-box; padding: 0px;">
<pre class="prettyprint linenums">
Git  Status.
Git add . 
Git Commit -m "your message"
Git push origin branch_name
Git pull origin master
</pre>
</div>
</div>

</div>

<div class="pr_description"> 
<p class="margin_top_15">First of all , you have to create a Repository . You can click this link and create <a target="_blank" href="https://github.com/new">https://github.com/new</a> .</p>  
<img class="margin_top_15" src="{{ asset('public/image/create_repo.PNG') }}" />
<p class="margin_top_15">
You can name of your repository name on project name . you can put your project description . You can define your project accessbily like Public and Private. If you want to anyone can access your project you can define public otherwise define private .
 </p>
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