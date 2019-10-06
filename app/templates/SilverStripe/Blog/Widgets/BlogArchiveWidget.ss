<% if $Archive %>
	<ul>
		<% loop $Archive.Limit($NumberToDisplay) %>
			<li>
				<a href="$Link" title="$Title">					
					<span class="text">$Title</span>
				</a>
			</li>
		<% end_loop %>
	</ul>
<% end_if %>
