<!-- .ct-stan  /scss/_content-standard.scss -->
<% if $Content %>
<div class="block text-center<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<% if $Heading %><h2>$Heading.XML</h2><% end_if %>
		<% if $Content %><div class="lead">$Content</div><% end_if %>
	</div>
</div>
<% end_if %>
