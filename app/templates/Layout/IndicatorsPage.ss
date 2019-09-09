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
			<div class="<% if $Menu(2)  %>col-md-9<% else %>col-md-12<% end_if %> typography">
				<div class="main-content">
					<% if $BannerImage %>
					<% else %>
						<h1>$MenuTitle</h1>
					<% end_if %>
					$Content
					<% loop $Children %>
						<% if $Pos == 1 || $Pos == 2%>
							<div class="indicators-first-item item-$Pos row">
								<div class="icon col-sm-1">
									<img src="images/icon-info-{$Pos}.png" />
								</div>
								<div class="content col-sm-11">
									<a href="$Link">$Title</a>
									<span>$Summary</span>
								</div>
							</div>
						<% end_if %>
					<% end_loop %>
				</div>
			</div>
		</div>
	</div>
</section>