<% if $wrapperClass %><div class="{$wrapperClass}"><% end_if %>
	<% if $link %>
		<a href="{$link}" class="sc-button {$classes}" <% if $newWindow %>target="_blank" <% end_if %><% if $noFollow %>rel="nofollow" <% end_if %>>
			<% if $iconClass %><i class="{$iconClass}"></i><% end_if %> $content
		</a>
	<% else %>
		<button class="sc-button {$classes}">
			<% if $iconClass %><i class="fa {$iconClass}"></i><% end_if %> $content
		</button>
	<% end_if %>
<% if $wrapperClass %></div><% end_if %>