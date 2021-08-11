<% if $StandardsListing %>
    <% loop $StandardsListing %>
        <div class="standards-listing-item">
            <h2><% if $SectionNumber %>{$SectionNumber}.<% end_if %> $Title</h2>
        </div>
    <% end_loop %>
<% end_if %>