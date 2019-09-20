<div class="typography">
	<% if $BannerImage %>
	<% else %>
		<h1>$MenuTitle</h1>
	<% end_if %>
	<% if $PageIntro %>
	<div class="pad-bottom">
		$PageIntro
	</div>
	<% end_if %>
</div>