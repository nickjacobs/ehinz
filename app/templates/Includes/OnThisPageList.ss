<% if $Subheadings %>
	<div class="on-this-page">
		<h3>On this page:</h3>
		<div class="row">
			<% loop $Subheadings %>
				<div class="col-12 on-this-page__item">
					<img class="bullet-arrow-hash" src="images/icon-arrow-down.png" />				
					<a href="#{$urlsegment}">
						$Title
					</a>
				</div>
			<% end_loop %>
		</div>
	</div>
<% end_if %>