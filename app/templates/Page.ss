<!DOCTYPE html>
<html lang="$ContentLocale" class="h-100">
  <head>

  	<% base_tag %>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><% if $MetaTitle %>$MetaTitle<% else %>$SiteConfig.Title<% end_if %></title> 

  $MetaTags(false) 

  <link rel="apple-touch-icon" sizes="180x180" href="images/favicon-big.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-md.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-sm.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <link rel="alternate" href="$AbsoluteLink" hreflang="en-nz">
  <link rel="canonical" href="$AbsoluteLink">
  <%-- <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<% if $MetaTitle %>$MetaTitle<% else %>$SiteConfig.Title<% end_if %>">
  <meta property="og:description" content="$MetaDescription">
  <meta property="og:url" content="$AbsoluteLink">
  <meta property="og:site_name" content="Data Protection and Use Policy">
  <meta property="og:image" content=""> --%>
  
  <% require css('public/css/style.min.css') %>
  <%-- <script src="https://kit.fontawesome.com/f7dd464e09.js"></script> --%>
    
  </head>
  <body class="cls-{$ClassName.LowerCase} section-{$Level(1).URLSegment.Lowercase} page-{$ID}  d-flex flex-column h-100" id="top">
      
      <main role="main" class="flex-shrink-0">
        <div id="headerAndNav">
        <% include Header %>
        <% include Navigation %>
        <% include Banner %>
        
        </div>
        $Layout
      </main><!-- /.container -->
      <% include Footer %>

    <% require javascript('public/javascript/scripts.min.js') %>  
    <%--
    <script>
    AOS.init();
    </script> 
    --%>
  </body>
</html>
