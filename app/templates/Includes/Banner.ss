<% if $BannerImage %>
	<div class="banner" id="MainBanner" style="background-image: url($BannerImage.Fill(1500,700).URL);">
		<div class="container">		
			<div class="banner__title" >
				<% if $BannerTitle %>			
					<h1 class=""><span class="sr-only">$BannerTitle</span><img class="img-fluid" role="presentation" alt="" src="$BannerTitle.Link"></h1>
				<% else %>
					<h1 class="no-bannertitle-img">$Title</h1>
				<% end_if %>
			</div>
		</div>		
	</div>
<% end_if %>