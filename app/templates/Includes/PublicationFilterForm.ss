<div class="publication-filter">
<h3>Search for publications</h3>
<form action="$FilterFormUrl" method="GET" class="filter-form form-inline mb-3">		
	<div class="form-row">
		<div class="col-md-4">
			<label class="sr-only" for="Keywords">Keywords</label>
			<input type="text" name="Keywords" class="w-100 form-control " id="Keywords" placeholder="Search for keywords" value="$getQueryVar">
		</div>
		<div class="col-md-4">
			<label class="sr-only" for="Form_PublicationSearchForm_Topic">Topic</label>	
			<select name="Topic" class="custom-select  w-100" id="Form_PublicationSearchForm_Topic">
				<option value="" selected="selected">Choose topic</option>
				<% loop getTopics %>
					<option value="$ID" <% if $ID == $Top.getTopicVar %>selected="selected"<% end_if %>>$Topic</option>
				<% end_loop %>
			</select>
		</div>
		<div class="col-md-3">
			<label class="sr-only" for="Form_PublicationSearchForm_DocType">Type</label>
			<select name="DocType" class="w-100 custom-select" id="Form_PublicationSearchForm_DocType">
				<option value="" <% if $getTypeVar == '' %>selected="selected"<% end_if %>>Choose type</option>
				<option value="Factsheet" <% if $getTypeVar == 'Factsheet' %>selected="selected"<% end_if %>>Factsheet</option>
				<option value="Metadata" <% if $getTypeVar == 'Metadata' %>selected="selected"<% end_if %>>Metadata</option>
				<option value="Background" <% if $getTypeVar == 'Background' %>selected="selected"<% end_if %>>Background</option>
				<option value="Report" <% if $getTypeVar == 'Report' %>selected="selected"<% end_if %>>Report</option>
			</select>
		</div>
		<div class="col-md-1">					
				<input type="submit" value="Search" class="btn filter-form__btn">
				<div id="clearFilterForm"></div>			
		</div>
	</div>
</form>
</div>