<div  class="pageBody boxMain">
    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h2 class="banner_heading"> English to hindi &amp; Hindi to english Conversion </h2>
               
            </div>
        </div>
    </div>
    </div>
<div class="container">
    <script type="text/javascript" src="https://www.google.com/jsapi?key=ABQIAAAAZvWfWJMheRpMuCH2keiWvxRnG4Z6XyCL8mbVpifis1FtNM3NyBR6aH0SZzpXLMlpXNKs9sORd8l-GQ">
    </script>
    <script type="text/javascript">
      // Load the Google Transliterate API
      google.load("elements", "1", {
            packages: "transliteration"
          });

      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };

        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
        control.makeTransliteratable(['transliterateTextarea']);
	control.makeTransliteratable(['nilesh']);
	control.makeTransliteratable(['jitenra']);
      }
      google.setOnLoadCallback(onLoad);
    </script>
	<div class="col-sm-6 col-md-8 col-lg-8">
		<div class="row">
           <div class="">
					<div class="panel-body">
					 <div class="row panel panel-default padding_div"> 
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                      <h2 class="titleList">Type in Hindi (Press Ctrl+g to toggle between English and Hindi)</h2>
					  <div class="form-group"> 
					   <textarea class="form-control" name="Event" cols="100" rows="10" id="transliterateTextarea" placeholder="Type text here"></textarea><br />
			          </div> 
			           <br />
			          <div>
					      
                          
                       <ul class="shareListing">
                         <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=http://jswebsolutions.in/english_to_hindi_hindi_to_english_conversion"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                          <li><a href="https://plus.google.com/share?url=http://jswebsolutions.in/english_to_hindi_hindi_to_english_conversion" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                       </ul>
                       </div>
			          </div>
                      </div>
                    </div>
				</div>
		</div>
		<div>
		</div>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-4 panel-body">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3 class="titleList">Popular Post</h3>
                <hr />
				  <style> .anchortag{ text-decoration:none; } </style>
				 <?php
				 if($post != FALSE){
				     $i=1;
				    foreach($post as $postListArr){
				        $title_url = $postListArr['title_url'];
				        if( $i == 5){ break; }
				       ?>
				       <div>
                        <p class="side_titleList"><?php if($postListArr['title']){ echo $postListArr['title'];  } ?></p>
                        <p class="text-muted postDate">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php if(!empty($postArr['postedBy']))echo $postArr['postedBy']?> | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php if(!empty($postArr['crEditdate']))echo date("d/m/Y",$postArr['crEditdate']); ?></p>
                        <?php
                          if(!empty($postListArr['title_url'])){
                             ?>
                             <a class="postDate anchortag" href="<?php echo base_url("blogPost/$title_url"); ?>">Read More</a>
                             <?php  
                          } 
                        ?>
                       </div>
                        <hr>
				       <?php    
				     $i++;
				    } 
				 }
				 ?> 
			</div>
		</div>
	</div>
</div>
</div>
