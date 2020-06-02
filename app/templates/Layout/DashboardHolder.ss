<section class="main-page-content indicators">
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
			<div class="<% if $Menu(2)  %>col-md-9<% else %>col-md-12<% end_if %> ">
				<div class="main-content">
					<% include IntroSection %>
					<% include ContentSection %>


                    <div class="dashboard-page-list">
                    <% if AllChildren %>
                        <% loop AllChildren %>
                            <% if $ClassName == 'DashboardPage' %>
                            <div class="dashboard-page-list__item">
                            <h5>Interactive Dashboard</h5>
                            <h2>$Title</h2>
                            <a href="$DashboardLink" target="_blank">Open dashboard in new window</a>
                            </div>
                            <% end_if %>
                        <% end_loop %>
                    <% end_if %>
                    </div>

					
					
				</div>
			</div>
		</div>
	</div>
</section>
