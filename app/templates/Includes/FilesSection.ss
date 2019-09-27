<% if $Files %>
	<div class="downloads expand-box" id="downloads">
		<h3 class="toggle-clicker"><img src="images/icon-download.png" /> Downloads <img class="toggle-btn <% if $SiteConfig.DownloadsOpen %>open<% end_if %>" src="images/icon-toggle.png" /></h3>
		<div class="row row-toggle <% if $SiteConfig.DownloadsOpen %>open<% end_if %>">
			<% loop $Files %>
				<div class="col-1">
					<% if $DocType == 'Background' %><img src="images/icon-doc-background.png" /><% end_if %>
					<% if $DocType == 'Metadata' %><img src="images/icon-doc-metadata.png" /><% end_if %>
					<% if $DocType == 'Factsheet' %><img src="images/icon-doc-factsheet.png" /><% end_if %>
				</div>
				<div class="col-11 col-md-5 content">
					<a href="$Link" target="_blank">
						<strong>$DocType:</strong> 
						$Title
					</a>
				</div>
			<% end_loop %>
		</div>
	</div>
<% end_if %>