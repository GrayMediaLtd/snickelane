<% if $Tags %>
<div class="blogTagCloud">
	<% loop $Tags %>
		<a href="$Link" title="$TagName">
			<span class="tagCount{$NormalizedTag}">$TagName</span>
		</a>
	<% end_loop %>
</div>
<% end_if %>
