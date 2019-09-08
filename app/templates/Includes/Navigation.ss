<nav class="navbar navbar-expand-sm" id="topLevelNav"> 
    <div class="container" id="mainNavigation">
        <ul class="nav navbar-nav nav-fill w-100">        
          <% loop Menu(1) %>          
          <li class="nav-item section-{$ID}">
            <a class="nav-link $LinkingMode" title="{$MenuTitle}" href="$Link" >$MenuTitle <% if $LinkingMode=='current'%><span class="sr-only">(current)</span><% end_if %></a>              
          </li>          
          <% end_loop %>
        </ul>
      </div>  
</nav>