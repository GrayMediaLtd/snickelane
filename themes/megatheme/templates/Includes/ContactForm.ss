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
			<% if $Name = 'action_process' %>
			   $addExtraClass(btn btn-primary btn-round btn-block-xs).Field
			<% else %>
			   $Field
			<% end_if %>
		<% end_loop %>
	</div>
	<% end_if %>
<% if $IncludeFormTag %>
</form>
<% end_if %>