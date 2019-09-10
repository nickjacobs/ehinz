<div class="blog container">
	<div class="row">
		<div class="col-md-12">

			<h1>Latest News</h1>

			<% if $PaginatedList.Exists %>
				<% loop $PaginatedList %>
					<% include SilverStripe\\Blog\\PostSummary %>
				<% end_loop %>
			<% else %>
				<p><%t SilverStripe\\Blog\\Model\\Blog.NoPosts 'There are no posts' %></p>
			<% end_if %>

			<% with $PaginatedList %>
				<% include SilverStripe\\Blog\\Pagination %>
			<% end_with %>

			$Form
			$CommentsForm

			
		</div>
	</div>
</div>

<% include SilverStripe\\Blog\\BlogSideBar %>
