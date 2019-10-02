
<section class="main-page-content">
	<div class="container">		
		<div class="row">
			<div class="col-md-9">

				<h1>Latest News</h1>

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
			<div class="col-md-3">
				<% include SilverStripe\\Blog\\Includes\\BlogSideBar %>	
			</div>
		</div>
	</div>
</section>
