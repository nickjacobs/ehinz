<% if $Files %>
	<div class="downloads expand-box" id="downloads">
		<h3 class="toggle-clicker"><img src="images/icon-download.png" /> Surveillance Reports and Metadata <img class="toggle-btn <% if $SiteConfig.DownloadsOpen %>open<% end_if %>" src="images/icon-toggle.png" /></h3>
		<div class="row row-toggle <% if $SiteConfig.DownloadsOpen %>open<% end_if %>">
			<% loop $Files.Sort(FileSort) %>
				<div class="col-1 download-icon">
					<% if $DocType == 'Background' %><img src="images/icon-doc-background.png" /><% end_if %>
					<% if $DocType == 'Metadata' %><img src="images/icon-doc-metadata.png" /><% end_if %>
					<% if $DocType == 'Surveillance Report' %>
						<% if $OnlineLink %>
							<img src="images/icon-doc-surveillance-interactive.png" title="Interactive factsheet available"/>
						<% else %>
							<img src="images/icon-doc-surveillance.png" />
						<% end_if %>
					<% end_if %>
					<% if $DocType == 'Report' %><img src="images/icon-doc-report.png" /><% end_if %>
				</div>
				<div class="col-11 col-md-5 content">
					<div class="download-item">
						<strong>$DocType:</strong>
						$Title
					<% if $OnlineLink %><a href="$OnlineLink" target="_blank">View interactive report</a><% end_if %>
				<% if $File %><a href="$File.Link" target="_blank">Download report PDF</a><% end_if %>
					</div>
				</div>
			<% end_loop %>
		</div>
	</div>
<% end_if %>
