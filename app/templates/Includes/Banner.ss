<div class="banner">
	<div class="container">		
		<div class="banner__title" >
			<% if BannerTitle %>			
			<h1 class=""><span class="sr-only">$Title</span><img class="img-fluid" role="presentation" alt="" src="$BannerTitle.Link"></h1>
			<% else %>
			<h1 class="no-bannertitle-img">$Title</h1>
			<% end_if %>
		</div>
	</div>		
</div>