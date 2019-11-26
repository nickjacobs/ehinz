<section class="main-page-content">
	<div class="container">		
		<div class="row">
			<% if $Menu(2) %>
				<div class="col-md-3">
					<% with $Level(1) %>
						<div class="side-header">$MenuTitle</div>
						<ul class="side-menu">
							<% include SidebarMenu %>
						</ul>
					<% end_with %>
				</div>
			<% end_if %>
			<div class="<% if $Menu(2)  %>col-md-9<% else %>col-md-12<% end_if %>">
			<% include IntroSection %>
			<% include ContentSection %>


			<% include PublicationFilterForm %>

			<div class="publication-search-results">
			
			<% if $Results %>
			<div class="row">
				<% loop $Results %>
				<div class="col-md-6">
					<div class="result-item h-100">
					<div class="row">
						<div class="download-icon col-2">
							<% if $DocType == 'Background' %><img src="images/icon-doc-background.png" /><% end_if %>
							<% if $DocType == 'Metadata' %><img src="images/icon-doc-metadata.png" /><% end_if %>
							<% if $DocType == 'Factsheet' %><img src="images/icon-doc-factsheet.png" /><% end_if %>
							<% if $DocType == 'Report' %><img src="images/icon-doc-report.png" /><% end_if %>
						</div>
						<div class="content col-10">
							<a href="$File.Link" target="_blank">
								<strong>$DocType:</strong> 
								$Title
							</a>
						</div>
					</div>
					</div>
				</div>
				
				<% end_loop %>
			</div>
			<% end_if %>

			</div>



			</div>
		</div>
	</div>
</section>
<% include SideTabs %>


