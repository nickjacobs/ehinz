<section class="main-content">
    <div class="container">
    <% include PageHeader %>  	
   	<div class="row">
		<div class="col-md-6">
			
        <% if $Content %><div class="content">$Content</div><% end_if %>

        	


      	</div>
      	<div class="col-md-6 contact-form">
        <h5 class="">Contact form</h5>
        


      		<% if Success %>
				<div class="alert-message">
					Thank you for getting in touch - we'll review your comments and get back to you soon.
				</div> 
      		<% else %>
      			$Form
      		<% end_if %>
      	</div>
    </div>	
	
  </div> 
</section>


<% include Testimonials %>