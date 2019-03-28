<% if $Posts %>
<div class="widget_links">
	<ul>
		<% loop $Posts %>
			<li>
				<a href="$Link" title="$Title">
					<span class="text">$Title</span>
				</a>
			</li>
		<% end_loop %>
	</ul>
</div>
<% end_if %>