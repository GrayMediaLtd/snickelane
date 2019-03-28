<% if $Retailers %>
<div class="block-retailer block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
	<div class="row no-gutter">
		<% loop $Retailers %>
		<div class="col-xs-12 col-md-6 col-lg-4 block-retailer-item" onclick="window.location.href = '{$Link}';">
			<img src="{$PageImage.FocusFill(635,476).URL}" alt="{$Title.XML}" class="bri-img" />
			
			<h3 class="bri-title"><a href="{$Link}">{$Title}</a></h3>
			
			<div class="bri-type">{$Cuisine}, {$Type}</div>
			
			<div class="bri-overlay"></div>
		</div>
		<% end_loop %>
	</div>
</div>
<% end_if %>