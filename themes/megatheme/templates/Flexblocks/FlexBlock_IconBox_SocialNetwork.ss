<div class="block-{$ClassName} {$HTMLClasses} fb-social-network" id="block-{$ID}">
	<div>
		<div class="row no-gutter">
			<div class="col-xs-12 col-sm-12 col-md-6 vertical-middle text-center fbsn-left">
				<span>FOLLOW US:</span>
				
				<% loop $Boxes.sort(SortOrder) %>
				<a
					href="{$Link}"
					class="inherit-color <% if $LinkBehaviour == 4 %>btn-open-lightbox<% end_if %>"
					<% if $LinkBehaviour == 4 %>
					rel="nofollow"
					<% else_if $LinkBehaviour == 3 %>
					target="_blank" rel="nofollow"
					<% else_if $LinkBehaviour == 2 %>
					rel="nofollow"
					<% else_if $LinkBehaviour == 1 %>
					target="_blank"
					<% end_if %>
				>
					<i class="fa {$IconClass}"></i>
				</a>
				<% end_loop %>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-6 vertical-middle fbsn-right" data-remodal-target="block-content-{$ID}">
				<a data-remodal-target="block-content-{$ID}" href="#block-content-{$ID}" class="heading">$Heading.XML</a>
			</div>
		</div>
	</div>
</div>

<div class="remodal" data-remodal-id="block-content-{$ID}" data-remodal-options="hashTracking: false">
	<button data-remodal-action="close" class="remodal-close"></button>
	<div class="typography clearfix">$Content</div>
</div>
