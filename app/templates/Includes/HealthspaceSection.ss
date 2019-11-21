<% if $HealthspaceExtra %>
<div class="healthspace-link-section">
	<h3><% if $HealthspaceExtraTitle %>$HealthspaceExtraTitle<% else %>$SiteConfig.HealthspaceHeader<% end_if %></h3>
	$HealthspaceExtra
</div>
<% end_if %>