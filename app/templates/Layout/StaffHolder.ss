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
				
				<div class="typography">	
					<div class="pad-bottom">
						$Content
					</div>
				</div>


				<% if ProjectTeam %>
				<div class = "staff-section">
					<% loop ProjectTeam %>
					<div class="row staff-member $FirstLast">
						<div class="col-sm-3">
							<img src="$Image.ScaleWidth(400).Link" class="img-fluid staff-member__image">
						</div>	
						<div class="col-sm-9">
							<h3 class="staff-member__title">$Title</h3>
							<div class="staff-member__position">$Position</div>
							<div class="staff-member__content">$Content</div>
						</div>
						<div class="col-12"><hr></div>

					</div>
					<% end_loop %>
				</div>
				<% end_if %>


				<div class="typography">	
					<div class="pad-bottom">
						$TechContent
					</div>
				</div>


				<% if AdvisorTeam %>
				<div class = "staff-section">
					<% loop AdvisorTeam %>
					<div class="row staff-member $FirstLast">
						<div class="col-sm-3">
							<img src="$Image.ScaleWidth(400).Link" class="img-fluid staff-member__image">
						</div>	
						<div class="col-sm-9">
							<h3 class="staff-member__title">$Title</h3>
							<div class="staff-member__position">$Position</div>
							<div class="staff-member__content">$Content</div>
						</div>
						<div class="col-12"><hr></div>

					</div>
					<% end_loop %>
				</div>
				<% end_if %>





			</div>
		</div>
	</div>
</section>
