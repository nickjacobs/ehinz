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
						<% if ClassName.Shortname == 'Page' %>
							<div class="indicators-first-item item-{$Pos} row">
								<% if $SummaryIcon %>
								<div class="icon col-1">
									<img src="$SummaryIcon.URL" />
								</div>
								<% end_if %>
								<div class="content <% if $SummaryIcon %>col-10<% else %><% end_if %>">
									<a href="$Link">$Title</a>
									<span>$Summary</span>
								</div>
							</div>
						<% end_if %>
					<% end_loop %>
					<div class="page-groups">
						<% loop $IndicatorGroups %>
							<div class="page-group">
								<h2>$Title</h2>
								<% loop $Pages %>
									<div class="page">
										<div class="row tiny-gutters">
											<% if $ShowSummaryThumb %>
												<div class="col-2">
													<img src="$ShowSummaryThumb.Fill(120,120).Link" />
												</div>
											<% end_if %>
											<div class="page-content <% if ShowSummaryThumb %> col-10 <% else %> col-12 <% end_if %>">
												<h3><a href="$Link">$Title</a></h3>
												<p>$Summary</p>
												<hr>
											</div>
										</div>
									</div>
								<% end_loop %>
							</div>
						<% end_loop %>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>