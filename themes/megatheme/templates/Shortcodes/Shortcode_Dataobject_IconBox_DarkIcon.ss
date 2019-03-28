<% if $Items %>
	<% loop $Items %>
	<div class="iconbox iconbox-v2">
		<% if $HTMLClasses %>
		<div class="iconbox-icon">
			<i class="{$HTMLClasses}"></i>
		</div>
		<% end_if %>
		
		<div class="iconbox-content">
			<% if $Title %>
			<h3 class="iconbox-title">
				<% if $Link %>
				<a
					href="{$Link}"
					class="inherit-color <% if $LinkBehaviour == 4 %>btn-open-lightbox<% end_if %>"
					<% if $LinkBehaviour == 4 %>
					rel="nofollow"
					<% else_if $LinkBehaviour == 3 %>
					target="_blank" rel="nofollow"
					<% else_if $LinkBehaviour == 2 %>
					rel="nofollow"
					<% else_if $LinkBehaviour == 1 %>
					target="_blank"
					<% end_if %>
				>
					{$Title.XML}
				</a>
				<% else %>
				{$Title.XML}
				<% end_if %>
			</h3>
			<% end_if %>
			
			<% if $Content %><p>$Content.XML</p><% end_if %>
		</div>
	</div>
	<% end_loop %>
<% end_if %>