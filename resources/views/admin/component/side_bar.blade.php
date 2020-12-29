<style>
.nav-sidebar { 
    width: 100%;
    padding: 8px 0; 
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
    -webkit-border-radius: 4px 0 0 4px; 
    -moz-border-radius: 4px 0 0 4px; 
    border-radius: 4px 0 0 4px; 
}
.nav-sidebar .active a { 
    cursor: default;
    background-color: #428bca; 
    color: #fff; 
    text-shadow: 1px 1px 1px #666; 
}
.nav-sidebar .active a:hover {
    background-color: #428bca;   
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis; 
}

/* Right-aligned sidebar */
.nav-sidebar.pull-right { 
    border-right: 0; 
    border-left: 1px solid #ddd; 
}
.nav-sidebar.pull-right a {
    -webkit-border-radius: 0 4px 4px 0; 
    -moz-border-radius: 0 4px 4px 0; 
    border-radius: 0 4px 4px 0; 
}
</style>
<div class="row">
           <div class="panel-body">
			   <div class="row panel panel-default padding_div"> 
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <nav class="nav-sidebar">
                <ul class="nav">
                    <li class="active banner_heading"><a href="">Navigation</a></li>
                      <li><a href="<?php echo url('js_admin/pages') ?>">Pages</a></li>
                  <!--  <li><a href="<?php echo url('js_admin/create_post') ?>">Create New Post</a></li>-->
                    <li><a href="<?php echo url('js_admin/post') ?>">Post List</a></li>
                    <li><a href="<?php echo url('js_admin/post_function_list') ?>">Post Function List</a></li>
                  <!--  <li><a href="<?php echo url('js_admin/save_site_map') ?>">Save sitemap url</a></li>
                    <li><a href="<?php echo url('js_admin/save_site_map') ?>">Post Seo Content</a></li>-->
                     <li><a href="<?php echo url('js_admin/seo_management') ?>">Seo Management</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="<?php echo url('logout') ?>"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>
                </ul>
            </nav>
                    </div>
                    </div>
                </div>
           </div>
		</div>