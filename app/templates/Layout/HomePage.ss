<section class="main-page-content home-page">
	<div class="container">		
		<div class="row">
			<div class="col-md-8">
				<div class="home-content typography">
					$Content
				</div>
				<div class="sub-pages">					
						<div class="row row-smaller">							
							<% loop $IndicatorsHolders %>															
									<div class="col-sm-6 col-lg-4 col-smaller">
										<a class="sub-page" href="$Link"<% if $SummaryThumb %>style="background-image: url($SummaryThumb.Fit(360,360).Link);"<% else_if $BannerImage %>style="background-image: url($BannerImage.Fit(360,360).Link);"<% end_if %>>
											<span class="tip">
												$Summary
											</span>
											<span class="title">$Title <% if $TeReoTitle %><span class="tereotitle"><br>$TeReoTitle</span><% end_if %></span>

										</a>
									</div>								
							<% end_loop %>
						</div>
					
				</div>
			</div>
			<div class="col-md-4">
				<div class="home-side">
					<% if $KeyFindings %>
					<h4>Latest key findings</h4>
					<ul class="key-findings">
						<% loop $KeyFindings.sort('Sort') %>
							<li>
							<% if $PageLink %><a href="$PageLink.LinkURL"><% end_if %>
								<div class="key-finding-title">$Title</div>
							<% if $PageLink %></a><% end_if %>
							<div class="key-finding-summary">$Summary</div>
							</li>
						<% end_loop %>
					</ul>
				<% end_if %>					
					
					<h4>Latest news</h4>
					<ul class="blog-items">
						<% loop $LatestPosts(4) %>
							<li>
								<a class="$LinkingMode" href="$Link">
									$Title									
								</a>
								<span class="date">$NiceDatePublished</span>
							</li>
						<% end_loop %>
					</ul>					
					
					<h4>$HealthspaceHeading</h4>
					<div class="healthspace">
						$HealthspaceDescription
						<a href="https://healthspace.ac.nz/" target="_blank"><img class="img-fluid" src="$HealthspaceImage.ScaleWidth(340).Link" /></a>
					</div>	
					<h4>$QuickLinksHeading</h4>
					<div class="quick-links">
						$QuickLinks
					</div>				
				</div>
			</div>
		</div>
	</div>
</section>