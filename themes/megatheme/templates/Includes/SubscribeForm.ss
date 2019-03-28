<% if $IncludeFormTag %>
<form $addExtraClass('form-inline').AttributesHTML>
<% end_if %>
	<% include FormMessage %>

	<div class="input-group">
		<% loop $Fields %>
			<% if $Name = 'SubscribeEmail' %>
			$addExtraClass('input-group-field')
			<% else %>
			$FieldHolder
			<% end_if %>
		<% end_loop %>
		<span class="input-group-btn">
		  <button id="{$FormName}_action_doSubscribe" value="Go" class="btn btn-outline-secondary" name="action_doSubscribe" type="submit"><%t SubscribeFormWidgetSS.Go "Go" %></button>
		</span>
    </div>
<% if $IncludeFormTag %>
</form>
<% end_if %>
