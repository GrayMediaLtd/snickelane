<!-- .ct-img-left  /scss/_contend-image-left.scss -->
<% if $Content %>
<div class="block ct-img-left p-t-0 p-b-0 block-{$ClassName}" id="block-{$ID}">
	<% if $ImageID %>
		<div class="image col-md-6" style="background-image: url({$Image.URL});">
		</div>
	<% end_if %>
	<div class="content col-md-6 <% if $HTMLClasses %> {$HTMLClasses} <% else %> p-t-3 p-b-3 p-r-3 p-l-3 <% end_if %>">
		<div class="container">
			<% if $Heading %>
			<h2 class="section-title">{$Heading.XML}</h2>
			<% end_if %>
			
			<div class="typography clearfix">$Content</div>
		</div>
	</div>
</div>
<% end_if %>
