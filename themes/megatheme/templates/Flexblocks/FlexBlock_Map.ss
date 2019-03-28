<div class="<% if $HTMLClasses %>{$HTMLClasses}<% else %>block block-v0 block-map<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<% if $MapUrl %>
	<div class="map">
		<iframe src="{$MapUrl}" style="border: 0; width: 100%;" allowfullscreen></iframe>

		<div class="touchable-area touchable-area-left hidden-sm-up"></div>
		<div class="touchable-area touchable-area-right hidden-sm-up"></div>
	</div>
	<% end_if %>

	<% if $Content %>
	<div class="block-address">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<span
						class="mc-hide-address"
						data-target=".block-address .address-container"
						data-show-text="<%t FlexBlockMap.DisplayAddress 'Display address' %>"
						data-hide-text="<%t FlexBlockMap.HideAddress 'Hide address' %>"
					>
						<%t FlexBlockMap.HideAddress 'Hide address' %>
					</span>

					<div class="block-content back-gray-light address-container">
						<div class="map-content text-white">
							<% if $Heading %>
								<h3 class="map-content-heading">$Heading.XML</h3>
							<% end_if %>

							$Content
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<% end_if %>
</div>
