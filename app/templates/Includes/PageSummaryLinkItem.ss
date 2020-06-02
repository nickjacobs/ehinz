<div class="page-summary-link-item $FirstLast row">
	<% if $SummaryIcon %>
	<div class="icon col-1">
		<img src="$SummaryIcon.URL" />
	</div>
	<% end_if %>
	<div class="content <% if $SummaryIcon %>col-10<% else %><% end_if %>">
		<% if $ClassName == 'DashboardPage' && $OpenDirectlyInNewWindow %>
			<a href="$DashboardLink" target="_blank">$Title</a>
		<% else %>
			<a href="$Link">$Title</a>
		<% end_if %>

		<% if $Summary %><span>$Summary</span><% end_if %>
	</div>
</div>