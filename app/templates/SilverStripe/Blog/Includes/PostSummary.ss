<div class="post-summary row">

	<% if $FeaturedImage %>
	<div class="col-2">
		<a href="$Link" title="<%t SilverStripe\\Blog\\Model\\Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
			<img class="img-fluid" src="$FeaturedImage.Fill(360,360).Link" />
		</a>
	</div>
	<% end_if %>

	<div class="<% if $FeaturedImage %>col-10 col-md-8<% else %>col-sm-10<% end_if %>">
		<a href="$Link" title="<%t SilverStripe\\Blog\\Model\\Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
			<span class="title">
				<% if $MenuTitle %>
					$MenuTitle
				<% else %>
					$Title
				<% end_if %>
			</span>
			<span class="date">
				$NiceDatePublished
    		</span>
			<span class="summary">
				<% if $Summary %>
					$Summary
				<% else %>
					<p>$Excerpt</p>
				<% end_if %>
			</span>
		</a>
	</div>

	<div class="col-sm-2">

	</div>

</div>
