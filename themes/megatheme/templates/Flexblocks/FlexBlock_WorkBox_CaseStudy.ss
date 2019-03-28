
<% if $Boxes.count %>
<div class="block block-{$ClassName} block-tpl-<% if $Template %>{$Template}<% else %>default<% end_if %> {$HTMLClasses} workbox-case-study" id="block-{$ID}">
    <div class="container-fluid">
		<div class="row row-compact row-workbox">
			<% loop $Boxes.sort(SortOrder) %>
			<div class="col-md-6 col-workbox">
				<div class="workbox">
					<% if $ImageID %>
						<img src="{$Image.URL}" alt="{$Title.XML}" />
					<% end_if %>
					
					<div class="detail">
						<div class="make-center">
							<div class="center">
							    <h4>Case Study</h4>
								<h3 class="bx-title">$Title.XML</h3>
								<div class="bx-content">
									<p>$Content.NoHTML</p>
									
									<% if $Link %>
									<p>
										<a class="btn btn-rounded btn-brand-third btn-md" href="{$Link}" {$LinkBehaviourAttr}><%t FlexBlock.LearnMore "Learn More" %></a>
									</p>
									<% end_if %>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
<% end_if %>
