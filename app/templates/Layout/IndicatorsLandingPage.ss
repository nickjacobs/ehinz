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
				<% include ContentSection %>

				
				<div class="indicators-overview-list">
					<% loop ChildrenOf(indicators/overview) %>
						<% include PageSummaryLinkItem %>
					<% end_loop %>
				</div>



				<div class="indicators-holders-list">
					<% loop $IndicatorsHolders %>					
						<% include IndicatorLinkItem %>				
					<% end_loop %>					
				</div>

				


			</div>
		</div>		
	</div>
</section>