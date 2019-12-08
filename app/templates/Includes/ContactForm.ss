<% if $IncludeFormTag %>
<form $AttributesHTML>
<% end_if %>
	<% if $Message %>
	<p id="{$FormName}_error" class="message $MessageType">$Message</p>
	<% else %>
	<p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
	<% end_if %>

	<div class="all-fields row">

		<% loop $Fields %>
	      <div id="$HolderID" class="col-md-12 field-$Name form-field $Type">
				<label class="" for="$ID">$Title <% if $Required %>*<% end_if %></label>
				$Field
	      </div>
		<% end_loop %>

		</div>

    <div class="g-recaptcha" data-expired-callback="unhappyCaptcha" data-callback="happyCaptcha" data-sitekey="$RecaptchaKey"></div>



	<% if $Actions %>
	<div class="Actions">
		<% loop $Actions %>
			$Field
		<% end_loop %>
	</div>
	<% end_if %>
<% if $IncludeFormTag %>
</form>
<% end_if %>
