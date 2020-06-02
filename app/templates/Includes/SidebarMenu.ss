<%--Include SidebarMenu recursively --%>
<% if LinkOrSection = section %>
	<% if $Children %>
		<% loop $Children %>
			<li class="$LinkingMode">
			<% if $ClassName == 'DashboardPage' && $OpenDirectlyInNewWindow %>
				<a href="$DashboardLink" class="$LinkingMode" target="_blank" title="Go to the $Title.XML page">
					<span class="text">$MenuTitle.XML</span>
				</a>
			<% else %>
				<a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
					<span class="text">$MenuTitle.XML</span>
				</a>
			<% end_if %>
				<% if $Children %>
					<ul>
						<% include SidebarMenu %>
					</ul>
				<% end_if %>
			</li>
		<% end_loop %>
	<% end_if %>
<% end_if %>