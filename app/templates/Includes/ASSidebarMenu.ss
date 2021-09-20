<% if $StandardsListing %>
	<div class="side-menu">
	<ul class="as-menu ">
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
	</div>
<% end_if %>
<% if $SortedASFiles %>
<div class="as-pdf-list">
	<h4>Standards documents</h4>
<% loop $SortedASFiles %>
	<div class="as-pdf-item">
		<div class="as-pdf-title"><a href="$File.Link">$Title</a></div>
		<% if $Summary %><div class="as-pdf-summary">$Summary</div><% end_if %>
	</div>
<% end_loop %>
</div>
<% end_if %>