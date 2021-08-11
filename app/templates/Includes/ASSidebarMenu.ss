<%--Include SidebarMenu recursively --%>

	<% if $StandardsListing %>
		<% loop $StandardsListing %>
			<li class="$LinkingMode">			
				<a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
					<span class="text"><% if $SectionNumber %>{$SectionNumber}.<% end_if %> $MenuTitle.XML</span>
				</a>				
			</li>
		<% end_loop %>
	<% end_if %>
