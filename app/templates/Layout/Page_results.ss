<div id="Content" class="container searchResults">
    <div class="row">
        <div class="col-md-12">
            <h1>$Title</h1>

            <% if $Query %>
                <p class="searchQuery">You searched for <span>&quot;{$Query}&quot;</span></p>
            <% end_if %>

            <% if $Results %>
            <ul id="SearchResults">
                <% loop $Results %>
                <li>
                    <h4>
                        <a href="$Link">
                            <% if $MenuTitle %>
                            $MenuTitle
                            <% else %>
                            $Title
                            <% end_if %>
                        </a>
                    </h4>
                    <% if $Content %>
                        <p>$Content.FirstSentence</p>
                    <% end_if %>
                    <a class="readMoreLink" href="$Link" title="Read more about &quot;{$Title}&quot;">Read more about &quot;{$Title}&quot;...</a>
                </li>
                <% end_loop %>
            </ul>
            <% else %>
            <p>Sorry, your search query did not return any results.</p>
            <% end_if %>

            <% if $Results.MoreThanOnePage %>
            <div id="PageNumbers">
                <div class="pagination">
                    <% if $Results.NotFirstPage %>
                        <a class="prev" href="$Results.PrevLink" title="View the previous page">&larr;</a>
                        <% end_if %>
                            <% loop $Results.Pages %>
                                <% if $CurrentBool %>
                                <span>$PageNum</span>
                                <% else %>
                                <a href="$Link" title="View page number $PageNum" class="go-to-page">$PageNum</a>
                                <% end_if %>
                            <% end_loop %>
                        <% if $Results.NotLastPage %>
                        <a class="next" href="$Results.NextLink" title="View the next page">&rarr;</a>
                    <% end_if %>
                </div>

            </div>
            <% end_if %>
        </div>
    </div>
</div>
<% include Footer %>