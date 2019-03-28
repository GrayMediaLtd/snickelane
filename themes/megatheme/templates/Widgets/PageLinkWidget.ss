<% if $Pages %>
<ul>
	<% loop $Pages %>
	<li>
		<a href="{$Link}">$MenuTitle.XML</a>
	</li>
	<% end_loop %>
</ul>
<% end_if %>