<% if $Tags %>
<div class="widget_links">
	<ul>
		<% loop $Tags %>
			<li>
				<a href="$Link" title="$Title">
					<span class="text">$Title</span>
				</a>
			</li>
		<% end_loop %>
	</ul>
</div>
<% end_if %>