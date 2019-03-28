<div class="block <% if $HTMLClasses %>{$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row block-form">
			<% if $Heading || $Content %>
			<div class="col-sm-6 col-xs-12">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography">$Content</div><% end_if %>
			</div>
			<% end_if %>
			
			<div class="<% if $Heading || $Content %>col-sm-6<% end_if %> col-xs-12">
				$Form
			</div>
		</div>
    </div>
</div>