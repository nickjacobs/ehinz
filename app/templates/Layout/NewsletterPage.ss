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

				<div class="newsletter-list">
					<% loop Newsletters.Sort('Sort ASC') %>						
						<div class="newsletter-item $FirstLast">
							<% if $First %><h6>Current newsletter</h6><% end_if %>
							<h4>$Title <span>($Date)</span></h4>
							<% if $CMLink %><i class="fal fa-external-link"></i> <a href="$CMLink" target="_blank">Web version</a><% end_if %>
							<% if $CMLink && $PDFFile %> | <% end_if %>
							<% if $PDFFile %><i class="fal fa-file-pdf"></i> <a href="$PDFFile.Link" target="_blank">PDF version</a><% end_if %>
							<hr>							
						</div>
						<% if $First %><h4 class="mb-3">Past newsletters</h4><% end_if %>
					<% end_loop %>
				</div>
			</div>
		</div>
	</div>
</section>