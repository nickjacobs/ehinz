<footer class="mt-auto">
	<div class="container">
		<div class="row">

			<div class="col-md-4">
				<div class="footer-header">
					<img src="images/footer-logo.png" />
				</div>
				<p>$SiteConfig.Address</p>

			</div>
			<div class="col-md-4">
				<div class="footer-header">
					What Are You Looking For?
				</div>
				$SiteConfig.FooterMenu
			</div>
			<div class="col-md-4">
				<div class="footer-header">
					More Information
				</div>
				$SiteConfig.FooterMenuAbout
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
		<div class="row">
			<div class="col">
				<div class="footer-partner-logo">$SVG('mu-logo-white').height(50).width(226)</div>
				<div class="footer-partner-logo"><img src="images/moh_logo2.png"></div>
                <div class="footer-partner-logo">$SVG('health-nz-logo').height(40)</div>
			</div>
		</div>
	</div>
</footer>
