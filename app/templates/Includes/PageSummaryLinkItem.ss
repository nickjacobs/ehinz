<div class="page-summary-link-item $FirstLast row">
	<% if $SummaryIcon %>
	<div class="icon col-1">
		<img src="$SummaryIcon.URL" />
	</div>
	<% end_if %>
	<div class="content <% if $SummaryIcon %>col-10<% else %><% end_if %>">
		<a href="$Link">$Title</a>
		<span>$Summary</span>
	</div>
</div>