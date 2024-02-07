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

                    <%-- hack to push dasboard to top on Water page --%>
                    <% if $ID != 388 %>
                        <% include ContentSection %>
                    <% end_if %>

					<% if $PageSummaryLinks %>
						<div class="page-summary-links">
						<% loop $PageSummaryLinks %>
							<% include PageSummaryLinkItem %>
						<% end_loop %>
						</div>
					<% end_if %>

                    <% if $ID == 388 %>
                        <% include ContentSection %>
                    <% end_if %>

					<div class="page-groups">
						<% if $IndicatorGroups %>
							<% loop $IndicatorGroups %>
								<div class="page-group">
									<h2 class="mb-3">$Title</h2>
									<% loop $Pages %>
										<div class="page">
											<% include IndicatorLinkItem %>
										</div>
									<% end_loop %>
								</div>
							<% end_loop %>
						<% else %>
							<% loop $IndicatorPages %>
								<div class="page">
									<% include IndicatorLinkItem %>
								</div>
							<% end_loop %>


						<% end_if %>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
