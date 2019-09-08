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
			<div class="<% if $Menu(2)  %>col-md-9<% else %>col-md-12<% end_if %> typography">
				<div class="main-content">
					<% if $BannerImage %>
					<% else %>
						<h1>$MenuTitle</h1>
					<% end_if %>
					$Content
				</div>
			</div>
		</div>
	</div>
</section>