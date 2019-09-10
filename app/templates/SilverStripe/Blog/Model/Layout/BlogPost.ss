<div class="container blog-post">
	<div class="row">
		<div class="col-sm-12">
			<h1>$Title</h1>
			<% include SilverStripe\\Blog\\EntryMeta %>
			<% if $FeaturedImage %>
				<p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
			<% end_if %>
			<div class="content">$Content</div>

			
		</div>
	</div>
</div>
