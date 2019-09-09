<% if $BannerImage %>
	<div class="banner" id="MainBanner" style="background-image: url($BannerImage.Fill(1500,470).URL);">
		<div class="container">		
			<div class="banner__title" >
				<% if $BannerTitle %>			
					<h1>$BannerTitle</h1>
				<% else %>
					<h1>$Title</h1>
				<% end_if %>
			</div>
		</div>		
	</div>
<% end_if %>