<% if $Links %>
	<div class="downloads expand-box links" id="links">
		<h3 class="toggle-clicker"><img src="images/icon-link.png" /> Useful links <img class="toggle-btn <% if $SiteConfig.LinksOpen %>open<% end_if %>" src="images/icon-toggle.png" /></h3>
		<div class="row row-toggle <% if $SiteConfig.LinksOpen %>open<% end_if %>">
			<% loop $Links %>
					<div class="col-1 content">
						<img class="bullet-arrow" src="images/icon-toggle.png" />
					</div>
					<div class="col-11 content">
						<a href="$URL" target="_blank">
							<span>$Title</span>
							$Summary
						</a>
					</div>
			<% end_loop %>
		</div>
	</div>
<% end_if %>