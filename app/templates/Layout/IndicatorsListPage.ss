<section class="main-page-content">
	<div class="container">
		<div class="row">
			<% if $Menu(2) %>
				<div class="col-md-3">
					<% with $Level(1) %>
						<div class="side-header">$MenuTitle</div>
						<ul class="side-menu">
							<% include SidebarMenu %>
						</ul>
					<% end_with %>
				</div>
			<% end_if %>
			<div class="<% if $Menu(2)  %>col-md-9<% else %>col-md-12<% end_if %>">
				<% include IntroSection %>
				<div id="show-side-trigger"></div>
                <% include ContentSection %>


                <div id="IndicatorListAccordionWrapper">



                    <div class="row align-items-center accordion-search-wrapper mb-4">
                        <div class="col-sm-5 search-input-col">
                            <input class="accordion-search-input form-control" type="text" id="IndicatorListSearch"  placeholder="Search by keyword" aria-label="Search by keyword" >
                        </div>
                        <div class="col-sm-3">
                            <div class="d-grid"><a href="#" class="btn btn-dark accordion-all-btn" id="IndicatorListAllBtn">ALL</a></div>
                        </div>
                    </div>



                    <div class="indicators-list-accordion">
                        <div class="accordion " id="IndicatorListAccordion">


                            <% loop $IndicatorsList %>
                                <% if $IndicatorListItems %>
                                <div class="card $FirstLast">
                                  <div class="card-header" id="IndicatorListHeading{$Pos}">
                                    <h2 class="mb-0">
                                      <button class="accordion-button btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#IndicatorListCollapse{$Pos}" aria-expanded="false" aria-controls="IndicatorListCollapse{$Pos}">
                                          $Topic
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="IndicatorListCollapse{$Pos}" class="indicator-panel collapse" aria-labelledby="IndicatorListHeading{$Pos}" >
                                    <div class="card-body">


                                        <div class="table-responsive">
                                            <table class="table table-sm indicators-table">
                                                <thead>
                                                <tr>
<%--                                                    <th scope="col">Domain</th>--%>
                                                    <th scope="col">Indicator</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <% loop $IndicatorListItems %>
                                                    <tr class="indicator-table-row" id="IndicatorTableRow{$Up.ID}_{$ID}">
<%--                                                        <td class="topic-cell">--%>
<%--                                                            <% loop $Topics %><% if $PageLink %><a href="{$PageLink.LinkURL}"><% end_if %>$Topic<% if $PageLink %></a><% end_if %><% if not $Last %>, <% end_if %>--%>
<%--                                                            <% end_loop %>--%>
<%--                                                        </td>--%>
                                                        <td class="title-cell">
                                                            <% if $PageLink %><a href="{$PageLink.LinkURL}"><% end_if %>
                                                            $Title
                                                            <% if $PageLink %></a><% end_if %>
                                                        </td>

                                                    </tr>
                                                <% end_loop %>

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                  </div>
                                </div>
                                <% end_if %>
                            <% end_loop %>
                        </div>
                    </div>











                </div>




			</div>
		</div>
	</div>
</section>
<% include SideTabs %>
