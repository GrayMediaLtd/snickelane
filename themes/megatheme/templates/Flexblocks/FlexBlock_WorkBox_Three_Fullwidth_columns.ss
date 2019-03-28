<% if $Boxes.count %>
<div class="block block-{$ClassName} block-tpl-<% if $Template %>{$Template}<% else %>default<% end_if %> {$HTMLClasses} workbox-default" id="block-{$ID}">
    <div class="container-fluid">
		<div class="row row-compact row-workbox">
			<% loop $Boxes.sort(SortOrder) %>
			<div class="col-md-4">
				<a href="{$Link}" class="workbox" {$LinkBehaviourAttr}>
					<% if $ImageID %>
						<img src="{$Image.URL}" alt="{$Title.XML}" />
					<% end_if %>
					
					<div class="detail">
						<div class="make-center">
							<div class="center">
								<h3 class="bx-title">$Title.XML</h3>
								<div class="typography bx-content">$Content</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
<% end_if %>
