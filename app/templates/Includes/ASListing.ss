<% if $StandardsListing %>
    <div class="standards-listing">
        <% loop $StandardsListing %>
            <div class="standards-listing-item mb-5">
                <h2><a href="$Link">$Title</a></h2>
                <% loop $Subheadings %>
                    <h3><a href="$Up.Link#{$urlsegment}">$Title</a></h3>
                <% end_loop %>
            </div>
        <% end_loop %>
    </div>
<% end_if %>