<% loop $AllChildren %>
	<li class="$LinkingMode">
		<a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
			<span class="arrow">&rarr;</span>
			<span class="text">$MenuTitle.XML</span>
		</a>
		
		<% if $AllChildren %>
			<ul class="list-unstyled">
				<% include SitemapItems %>
			</ul>
		<% end_if %>
	</li>
<% end_loop %>