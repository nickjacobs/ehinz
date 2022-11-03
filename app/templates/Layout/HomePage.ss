<section class="main-page-content home-page">
	<div class="container">		
		<div class="row">
			<div class="col-md-8">
				<div class="home-content typography">
					$Content
				</div>
				<div class="sub-pages">					
						<div class="row row-smaller">
							<div class="col-sm-6 col-lg-4 col-smaller starter">
								Explore our Environmental Health Indicators.
							</div>
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
					<h4>Latest News</h4>
					<ul class="blog-items">
						<% loop $LatestPosts %>
							<li>
								<a class="$LinkingMode" href="$Link">
									$Title									
								</a>
								<span class="date">$NiceDatePublished</span>
							</li>
						<% end_loop %>
					</ul>
					<h4>$QuickLinksHeading</h4>
					<div class="quick-links">
						$QuickLinks
					</div>
					<h4>$HealthspaceHeading</h4>
					<div class="healthspace">
						$HealthspaceDescription
						<img class="img-fluid" src="$HealthspaceImage.ScaleWidth(340).Link" />
					</div>					
				</div>
			</div>
		</div>
	</div>
</section>