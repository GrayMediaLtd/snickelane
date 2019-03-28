<!-- .ct-strip  /scss/_content-strip.scss -->

<% if $Content %>
<div class="block ct-strip<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <div class="col-md-4">	
            	<% if $Heading %>
					<h2 class="section-title">{$Heading.XML}</h2>
				<% end_if %>
            </div>
            <div class="col-md-8">
                    $Content
            </div>
        </div>
    </div>
</div>
<% end_if %>
