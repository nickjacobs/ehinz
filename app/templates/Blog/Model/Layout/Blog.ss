<div class="blog container">
	<div class="row">
		<div class="col-md-12">
			<% if $PaginatedList.Exists %>
				<% loop $PaginatedList %>
					<% include SilverStripe\\Blog\\PostSummary %>
				<% end_loop %>
			<% else %>
				<p><%t SilverStripe\\Blog\\Model\\Blog.NoPosts 'There are no posts' %></p>
			<% end_if %>
			$Form
			$CommentsForm

			<% with $PaginatedList %>
				<% include SilverStripe\\Blog\\Pagination %>
			<% end_with %>
		</div>
	</div>	

</div>

<% include BlogSideBar %>
