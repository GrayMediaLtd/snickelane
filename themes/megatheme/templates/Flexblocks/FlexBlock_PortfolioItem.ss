<% if $PortfolioItems %>
<div id="works" class="block block-v0 p-t-3 p-b-3 overflow-hidden block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
	<% if $Heading || $Content %>
	<div class="row">
		<div class="section-header text-center col-sm-8 offset-sm-2">
			<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
			<% if $Content %><div class="typography lead">$Content</div><% end_if %>
		</div>
	</div>
	<% end_if %>

	<div class="row row-compact">
		<% loop $PortfolioItems %>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<a href="{$Link}" class="portfolio-item">
				<% if $FeaturedImageID %>
				<div class="portfolio-thumbnail">
					<img src="{$FeaturedImage.FocusFillMax(768,512).URL}" class="img-responsive" alt="{$Title.XML}" />
				</div>
				<% end_if %>

				<div class="portfolio-detail">
					<h4>$Title.XML</h4>

					<% if $Categories %>
					<p><% loop $Categories %>{$Title.XML}<% if not $Last %>, <% end_if %><% end_loop %></p>
					<% end_if %>
				</div>
			</a>
		</div>
		<% end_loop %>
	</div>
</div>
<% end_if %>
