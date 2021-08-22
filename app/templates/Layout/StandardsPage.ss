<section class="main-page-content">
	<div class="container">		
		<div class="row">
			<% if $Menu(2) %>
				<div class="col-md-3">					
					<div class="side-header"><a href="$Parent.Link">$Parent.MenuTitle</a></div>
					<ul class="side-menu">
						<% include ASSidebarMenu %>
					</ul>					
				</div>
			<% end_if %>
			<div class="<% if $Menu(2)  %>col-md-9<% else %>col-md-12<% end_if %>">
				<div class="typography">
                    <h1>$Title</h1>                    
                    <% if $PageIntro %>
                    <div class="pad-bottom">
                        $PageIntro
                    </div>
                    <% end_if %>
                </div>
				<div id="show-side-trigger"></div>
				<% if $Content %>
                    <div class="typography">	
                        <div class="pad-bottom">
                            $GetFormattedContent
                        </div>
                    </div>
                <% end_if %>
			</div>
		</div>
	</div>
</section>
<% include SideTabs %>