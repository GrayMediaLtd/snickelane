<% if $IncludeFormTag %>
<form $AttributesHTML role="form">
<% end_if %>
	<% include FormMessage %>

	<fieldset>
		<% if $Legend %><legend>$Legend</legend><% end_if %> 
		<% loop $Fields %>
			$FieldHolder
		<% end_loop %>
		<div class="clear"><!-- --></div>
	</fieldset>

	<% if $Actions %>
	<div class="form-actions">
		<% loop $Actions %>
			$Field
		<% end_loop %>
	</div>
	<% end_if %>
<% if $IncludeFormTag %>
</form>
<% end_if %>
