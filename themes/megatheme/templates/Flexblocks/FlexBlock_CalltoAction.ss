<div
	class="fbcta block block-{$ClassName} <% if $HTMLClasses %>{$HTMLClasses}<% end_if %> <% if $Template %>block-tpl-{$Template}<% end_if %>" id="block-{$ID}"
	<% if $ImageID %>style="background-image: url('{$Image.URL}');"<% end_if %>
>
    <div class="container">
		<div class="row fbcta-row">
			<div class="col-md-9 fbcta-contents">
				<% if $Heading %>
				<h2 class="fbcta-heading">{$Heading}</h2>
				<% end_if %>
				
				<% if $Content %>
				<div class="fbcta-content typography">
					$Content
				</div>
				<% end_if %>
			</div>
			
			<div class="col-md-3 fbcta-buttons">
				<% if $Buttons.sort(BBSort) %>
					<% loop $Buttons.sort(BBSort) %>
						<% include ButtonSingle %>
					<% end_loop %>
				<% end_if %>
			</div>
		</div>
	</div>
</div>