<% if $Archive %>
<div class="widget_links">
	<ul>
		<% loop $Archive %>
			<li>
				<a href="$Link" title="$Title">
					<span class="text">$Title</span>
				</a>
			</li>
		<% end_loop %>
	</ul>
</div>
<% end_if %>
