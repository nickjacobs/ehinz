  <nav class="navbar navbar-expand-md" id="topLevelNav">
	<div class="container">
		<div class=" collapse navbar-collapse" id="mainNavigation">
			<ul class="navbar-nav w-100 nav-fill">
				<li class="d-block d-md-none">
					<% if $SearchForm %>				
						  <div class="search-bar">
							  $SearchForm
						  </div>
					  <% end_if %>
				</li>
				<% loop Menu(1) %>
					<% if $Children %>	  
						<li class="nav-item dropdown url-{$URLSegment}">
							<a class="nav-link dropdown-togglex" title="{$MenuTitle}" href="$Link" id="navbarDropdown{$ID}" role="button"  aria-haspopup="true" aria-expanded="false">
								$MenuTitle.XML <% if $LinkingMode=='current'%><span class="sr-only">(current)</span><% end_if %>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown{$ID}">
								<% loop $Children %>
								<a class="dropdown-item" title="{$MenuTitle}" href="$Link">$MenuTitle.XML <% if $LinkingMode=='current'%><span class="sr-only">(current)</span><% end_if %></a>
								<% end_loop %>
							</div>
						</li>
					<% else %>
						<li class="nav-item url-{$URLSegment}">
							<a class="nav-link" title="{$MenuTitle}" href="$Link">$MenuTitle.XML <% if $LinkingMode=='current'%><span class="sr-only">(current)</span><% end_if %></a>
						</li>
				<% end_if %>
				<% end_loop %>
			</ul>
		</div>
	</div>
</nav>