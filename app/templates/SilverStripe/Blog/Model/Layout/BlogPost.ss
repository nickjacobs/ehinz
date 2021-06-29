
<section class="main-page-content blogpost">
	<div class="container">		
		<div class="row">
			<div class="col-md-9">

				<h1>$Title</h1>
				<% include SilverStripe\\Blog\\EntryMeta %>
				<% if $FeaturedImage %>
					<p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
				<% end_if %>
				<div class="content">$Content</div>
			</div>
			<div class="col-md-3">
				<% include SilverStripe\\Blog\\Includes\\BlogSideBar %>	
			</div>
		</div>
	</div>
</section>
