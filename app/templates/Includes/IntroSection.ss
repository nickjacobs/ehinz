<div class="typography">
	<% if $BannerImage %>
	<% else %>
	<div class="page-title">
		<h1 class="<% if $TeReoTitle %>has-tereo<% end_if %>">$Title</h1>
		<% if $TeReoTitle %><span class="tereo-title">$TeReoTitle</span><% end_if %>
	</div>
	<% end_if %>
	<% if $PageIntro %>
	<div class="pad-bottom">
		$PageIntro
	</div>
	<% end_if %>
</div>