    <% if $Message %>
		<% if $MessageType == "good" %>
			<div id="{$FormName}_error" class="alert alert-success" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				$Message
			</div>
		<% else_if MessageType == "info" %>
			<div id="{$FormName}_error" class="alert alert-info" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				$Message
			</div>
		<% else_if MessageType == "bad" %>
			<div id="{$FormName}_error" class="alert alert-danger" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				$Message
			</div>
		<% end_if %>
	<% end_if %>
	
	$clearMessage