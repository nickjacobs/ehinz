<footer class="mt-auto">	
	<div class="container">
		<div class="row">

			<div class="col-md-4">
				<div class="footer-header">
					<img src="images/footer-logo.png" />
				</div>
				<p>$SiteConfig.Address</p>
				<img class="footer-badge" src="images/footer-logo-badge.png" />
			</div>
			<div class="col-md-4">
				<div class="footer-header">
					What Are You Looking For?
				</div>
				<ul>
					<% loop FooterMenuItems %>
						<li><a href="$Link">$Title</a></li>
					<% end_loop %>
				</ul>
			</div>
			<div class="col-md-4">
				<div class="footer-header">
					More Information
				</div>
				<ul>
					<% loop FooterMenuItemsAbout %>
						<li><a href="$Link">$Title</a></li>
					<% end_loop %>
				</ul>
				<div class="social-icons">
					<% if $SiteConfig.TWLink %>
						<a class="social-icon" href="$SiteConfig.TWLink" target="_blank"><img src="images/icon-tw.png" /></a>
					<% end_if %>
					<% if $SiteConfig.FBLink %>
						<a class="social-icon" href="$SiteConfig.FBLink" target="_blank"><img src="images/icon-fb.png" /></a>
					<% end_if %>
					<% if $SiteConfig.LinkedInLink %>
						<a class="social-icon" href="$SiteConfig.LinkedInLink" target="_blank"><img src="images/icon-in.png" /></a>
					<% end_if %>
				</div>
			</div>
		</div>		
	</div>
</footer>