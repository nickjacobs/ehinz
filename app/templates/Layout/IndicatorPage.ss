<section class="main-page-content indicator">
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
			<div class="<% if $Menu(2)  %>col-md-9<% else %>col-md-12<% end_if %> typography">
				<div class="main-content">
					<% if $BannerImage %>
					<% else %>
						<h1>$MenuTitle</h1>
					<% end_if %>
					$Content

					<% if $Files %>
						<div class="downloads expand-box">
							<h3 class="toggle-clicker"><img src="images/icon-download.png" /> Downloads <img class="toggle-btn" src="images/icon-toggle.png" /></h3>
							<div class="row row-toggle">
								<% loop $Files %>
										<div class="col-1">
											<% if $DocType == 'Background' %><img src="images/icon-doc-background.png" /><% end_if %>
											<% if $DocType == 'Metadata' %><img src="images/icon-doc-metadata.png" /><% end_if %>
											<% if $DocType == 'Factsheet' %><img src="images/icon-doc-factsheet.png" /><% end_if %>
										</div>
										<div class="col-5 content">
											<a href="$Link" target="_blank">
												<strong>$DocType:</strong> 
												$Title
											</a>
										</div>
								<% end_loop %>
							</div>
						</div>
					<% end_if %>

					<% if $Links %>
						<div class="downloads expand-box">
							<h3 class="toggle-clicker"><img src="images/icon-link.png" /> Useful links <img class="toggle-btn" src="images/icon-toggle.png" /></h3>
							<div class="row row-toggle">
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

					<% if $ExtraContent %>
						<div class="downloads expand-box on-this-page">
							<h3>On this page:</h3>
							<div class="row">
								<% loop $ExtraContent %>
									<div class="col-1 content smaller">
										<img class="bullet-arrow-hash" src="images/icon-toggle.png" />
									</div>
									<div class="col-11 content smaller">
										<a href="#content_$ID">
											<span class="bigger">$Title</span>
										</a>
									</div>
								<% end_loop %>
							</div>
						</div>
						<% loop $ExtraContent %>
							<div id="content_$ID" class="extra-content">
								<h2>$Title</h2>
								$Content
							</div>
						<% end_loop %>
					<% end_if %>

				</div>
			</div>
		</div>
	</div>
</section>