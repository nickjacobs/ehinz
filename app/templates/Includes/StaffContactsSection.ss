<% if $StaffContacts %>
	<div class="downloads expand-box contacts" id="staffcontacts">
		<h3 class="toggle-clicker"><img src="images/icon-info.png" /> Interested in more information? <img class="toggle-btn <% if $SiteConfig.ContactsOpen %>open<% end_if %>" src="images/icon-toggle.png" /></h3>
		<div class="row row-toggle <% if $SiteConfig.ContactsOpen %>open<% end_if %>">
			<div class="col-12">
			<% loop $StaffContacts.Sort(ContactSort).Limit(1) %>
				
				<div class="row staff-contact-item">
					<div class="col-sm-3">
						<img class="img-fluid" src="$Image.ScaleWidth(300).Link">
					</div>
					<div class="col-sm-9">
						<div class="domain-first">
							<h4>$Title</h4>	
							<% if $Email %><div>Email <a href="mailto:$Email">$Email</a></div><% end_if %>	
							<% if $Phone %><div>Phone <a href="tel:$Phone">$Phone</a> <% if $PhoneExt %>(ext {$PhoneExt})<% end_if %></div><% end_if %>
						</div>	


						<% if $Top.StaffContacts.Count > 1 %>
						<h6>Domain second<% if $Top.StaffContacts.Count > 2 %>s<% end_if %></h6>

							<% loop $Top.StaffContacts.Sort(ContactSort) %>
							<% if not $First %>
								<div class="domain-second"><a href="$Link">$Title</a> <% if $Email %>(email <a href="mailto:$Email">$Email</a>)<% end_if %></div>
							<% end_if %>
							<% end_loop %>
						<% end_if %>


					</div>
				</div>
				
				

					
					
			<% end_loop %>
		</div>
		</div>
	</div>
<% end_if %>