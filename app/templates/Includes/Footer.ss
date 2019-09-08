<footer class="mt-auto">	
	<div class="container">
		<div class="row">

			<div class="col-md-4">
				<div class="footer-header">
					<img src="images/footer-logo.png" />
					<img src="images/footer-logo-badge.png" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer-header">
					What Are You Looking For?
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer-header">
					More Information
				</div>
			</div>

			<div class="col-md-7">				
						
			</div>
			<div class="col-md-3 order-2 order-sm-1">
				<ul class="list-unstyled footer-menu">
					<% loop ChildrenOf(about) %>
					<li class=""><a href="$Link" class="">$MenuTitle</a></li>
					<% end_loop %>					
				</ul>				
			</div>
			<div class="col-md-2 order-1 order-sm-2">
				<ul class="list-unstyled social-menu">					
					<% if $SiteConfig.FBLink %><li class="social-link"><a href="$SiteConfig.FBLink" class="social-fb" target="_blank"><span><i class="fab fa-facebook-f"></i></span> Facebook</a></li><% end_if %>
					<% if $SiteConfig.TWLink %><li class="social-link"><a href="$SiteConfig.TWLink" class="social-tw" target="_blank"><span><i class="fab fa-twitter"></i></span> Twitter</a></li><% end_if %>
					<% if $SiteConfig.LinkedInLink %><li class="social-link"><a href="$SiteConfig.LinkedInLink" class="social-li" target="_blank"><span><i class="fab fa-linkedin-in"></i></span> LinkedIn</a></li><% end_if %>
					<% if $SiteConfig.EmailLink %><li class="social-link"><a href="$SiteConfig.EmailLink" class="social-nb" target="_blank"><span>{$SVG('neighbourly')}</span> Neighbourly</a></li><% end_if %>
									
				</ul>				
			</div>
		</div>		
	</div>
</footer>