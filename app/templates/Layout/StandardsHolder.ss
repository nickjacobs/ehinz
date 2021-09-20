<section class="main-page-content">
	<div class="container">		
		<div class="row">
			<% if $Menu(2) %>
				<div class="col-md-3">					
					<div class="side-header">$MenuTitle</div>
					
					<% include ASSidebarMenu %>
									
				</div>
			<% end_if %>
			<div class="<% if $Menu(2)  %>col-md-9<% else %>col-md-12<% end_if %>">
				<% include IntroSection %>
				<div id="show-side-trigger"></div>
				<% include ContentSection %>
                <% include ASListing %>

			</div>
		</div>
	</div>
</section>
<% include SideTabs %>