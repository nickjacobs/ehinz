<% if $CaseStudies %>
<section class="case-studies">
	<div class="container">
		<div class="row">
			<div class="col">
				<h3>$CaseStudyTitle</h3>
			</div>
		</div>
	
			<div class="carousel-holder">
			<% loop CaseStudies %>
			<div class="case-study-item carousel-cell w-100">
				<div class="row w-100">
					<div class="w-50">
						<div class="case-study-item__casenumber">
							$CaseNumber
						</div>
						<div class="case-study-item__title">
							<h2>$Title</h2>
						</div>						
					</div>
					<div class="w-50">
						<div class="case-study-item__content">
							$Content
						</div>
						<% if $CaseFile %>
						<div class="case-study-item__casefile">
							<a href="$CaseFile.Link" target="_blank" class="btn btn-primary btn-themed btn-casefile">See the case note <i class="fas fa-arrow-right"></i></a>
						</div>
						<% end_if %>
					</div>
				</div>			
			</div>
			<% end_loop %>
		</div>
	</div>
	
</section>
<% end_if %>