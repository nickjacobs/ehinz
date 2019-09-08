<nav class="navbar navbar-expand-sm" id="topLevelNav"> 
    <div class="container" id="mainNavigation">
        <ul class="nav navbar-nav nav-fill w-100">        
          <% loop $Menu(1) %>          
          <li class="nav-item section-{$ID}">
            <a class="nav-link $LinkingMode" title="{$MenuTitle}" data-id="$Link" href="$Link" >$MenuTitle <% if $LinkingMode=='current'%><span class="sr-only">(current)</span><% end_if %></a>
          </li>          
          <% end_loop %>
        </ul>
      </div>  
</nav>

<nav class="subnav" id="subNavigation"> 
	<div class="container" >
		<% loop $Menu(1) %>
			<% if $Children %>  
				<div class="subpages row" data-in-id="$Link">
					<div class="col-12">
						<h4>$MenuTitle</h4>
					</div>
					<% loop $Children %>
						<div class="col-3">
							<a class="$LinkingMode" title="{$MenuTitle}" href="$Link" >$MenuTitle <% if $LinkingMode=='current'%><span class="sr-only">(current)</span><% end_if %></a>
						</div>
					<% end_loop %>
				</div>
			<% end_if %>
		<% end_loop %>
	</div>
</nav>