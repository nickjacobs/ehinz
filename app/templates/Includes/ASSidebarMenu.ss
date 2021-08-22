	<% if $StandardsListing %>
		<ul class="as-menu">
		<% loop $StandardsListing %>
			<li class="$LinkingMode">			
				<a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
					<span class="text">$MenuTitle.XML</span>
				</a>
				<ul>
					<% loop $Subheadings %>
					<li><a href="$Up.Link#{$urlsegment}">$Title</a></li>
				<% end_loop %> 
				</ul>
			</li>
		<% end_loop %>
		</ul>
	<% end_if %>
