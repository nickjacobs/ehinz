
<section class="main-page-content">
	<div class="container">		
		<div class="row">
			<div class="col-md-9">

				<%-- <h1>Latest News</h1> --%>
				<h1>
				<% if $ArchiveYear %>
					<%t SilverStripe\\Blog\\Model\\Blog.Archive 'Archive' %>:
					<% if $ArchiveDay %>
						$ArchiveDate.Nice
					<% else_if $ArchiveMonth %>
						$ArchiveDate.format('MMMM, y')
					<% else %>
						$ArchiveDate.format('y')
					<% end_if %>
				<% else_if $CurrentTag %>
					<%t SilverStripe\\Blog\\Model\\Blog.Tag 'Tag' %>: $CurrentTag.Title
				<% else_if $CurrentCategory %>
					<%t SilverStripe\\Blog\\Model\\Blog.Category 'Category' %>: $CurrentCategory.Title
				<% else %>
					$Title
				<% end_if %>
				</h1>

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
