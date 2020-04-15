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

				<div id="iao-dashboard" style="width: 800px; height: 600px;"><script type="text/javascript" src="https://dashboards.instantatlas.com/embed/f0dd180614f64a1da784cc7a83e00643?container=iao-dashboard"></script></div>
				
				<% include ContentSection %>
				
			</div>
		</div>
	</div>
</section>
<% include SideTabs %>