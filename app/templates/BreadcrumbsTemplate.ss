<% if $Pages %>
<nav aria-label="breadcrumb">
    <p class="visually-hidden" id="breadcrumbs-label">You are here</p>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="$BaseHref">Home</a></li>
    <% loop $Pages %>
        <% if $Last %>
            <li class="breadcrumb-item active" aria-current="page">$Title.XML</li>
        <% else %>
            <li class="breadcrumb-item"><a href="$Link">$Title.XML</a></li>
        <% end_if %>
    <% end_loop %>
  </ol>
</nav>
<% end_if %>
