<section class="main-page-content home-page">
	<div class="container">		
		<div class="row">
			<div class="col-md-8 typography">
				<div class="home-content">
					$Content
				</div>
				<div class="sub-pages">
					<% with $Page(indicators) %>
						<div class="row row-smaller">
							<div class="col-sm-6 col-lg-4 col-smaller starter">
								Explore our Enviromental Health Indicators.
							</div>
							<% loop $Children %>
								<% if $BannerImage %>
									<div class="col-sm-6 col-lg-4 col-smaller">
										<a class="sub-page" href="$Link" style="background-image: url($BannerImage.Fit(360,360).Link);">
											<span class="tip">
												$Summary
											</span>
											<span class="title">$Title</span>
										</a>
									</div>
								<% end_if %>
							<% end_loop %>
						</div>
					<% end_with %>
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
									<span class="date">$PublishDate.Format(dd/mm/YYYY)</span>
								</a>
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
						<img class="img-responsive" src="$HealthspaceImage.ScaleWidth(340).Link" />
					</div>
					<a class="twitter-timeline" data-height="400" href="https://twitter.com/EHI_NewZealand?ref_src=twsrc%5Etfw">Tweets by EHI_NewZealand</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
			</div>
		</div>
	</div>
</section>