<a class="indicator-link-item" href="$Link">
	<div class="media mb-3 d-flex align-items-stretch">							
	  <% if $ShowSummaryThumb %><img src="$ShowSummaryThumb.Fill(120,120).Link" class="mr-3" alt="Image for $Title"><% end_if %>
	  <div class="media-body ">
	    <h5 class="mt-2 indicator-link-item__title">$Title</h5>
	    <div class="indicator-link-item__summary">$Summary</div>
	  </div>							
	</div>	
</a>