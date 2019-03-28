<% if $Categories %>
<div class="widget_links">
	<ul>
		<% loop $Categories %>
			<li>
				<a href="$Link" title="$Title">
					<span class="text">$Title</span>
				</a>
			</li>
		<% end_loop %>
	</ul>
</div>
<% end_if %>