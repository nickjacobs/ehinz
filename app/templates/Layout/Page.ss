<section class="main-page-content">
	<div class="container">		
		<div class="row">
			<% if $Children %>
				<div class="col-md-3">
					<div class="side-header">$Parent.MenuTitle</div>
				</div>
			<% end_if %>
			<div class="<% if $Children %>col-md-9<% else %>col-md-12<% end_if %> typography">
				<div class="main-content">
					$Content
				</div>
			</div>
		</div>
	</div>
</section>