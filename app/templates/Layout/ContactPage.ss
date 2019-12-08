<section class="main-page-content">
  <div class="container">   
    <div class="row">      
      
      <div class="col-md-7">
        <% include IntroSection %>
        <div id="show-side-trigger"></div> 
        <% include ContentSection %>         
      </div>
      <div class="col-md-4 offset-md-1">
        <% if Success %>
        <div class="alert-message">
          Thank you for getting in touch - we'll review your comments and get back to you soon.
        </div> 
          <% else %>
            $FormIntro
            $Form
          <% end_if %>
        </div>
      </div>
    </div>
  </div>
</section>
<% include SideTabs %>
