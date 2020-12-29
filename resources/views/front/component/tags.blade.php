<div class="row panel panel-default padding_div">
			<div class="panel-body">
				<h3 class="titleList">Tags</h3>
                <hr />
                @forelse($tags as $tag)
                 <a href='{{ url("$tag->page_slug") }}' class="btn btn-default" style="font-size: 12.482269503546px; margin:5px;" aria-label="3D Slider (37 items)">{{ $tag->page_name }} <span class="badge">{{ $tag->number_of_post }}</span></a>&nbsp;&nbsp;
                @empty
                 <a href="javascript::void()" class="btn btn-default" style="font-size: 12.482269503546px; padding:5px;">No tags <span class="badge">0</span></a>&nbsp;&nbsp;
                @endforelse
                 <a href='{{ url("git") }}' class="btn btn-default" style="font-size: 12.482269503546px; margin:5px;" aria-label="3D Slider (37 items)">GIT </a>&nbsp;&nbsp;
			</div>
		<a href="https://www.globehost.com/billing/aff.php?aff=3152"><img src="https://www.globehost.com/affiliate/images/webhost/250_x_250.png" width="800px"/></a>	
		</div>
 <!---->
										  