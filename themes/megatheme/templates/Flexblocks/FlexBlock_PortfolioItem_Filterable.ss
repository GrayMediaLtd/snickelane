<% if $PortfolioItems %>
<div id="works-{$ID}" class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<div class="row row-compact">
			<% if $Heading || $Content %>
			<div class="col-md-10 offset-md-1 section-header text-center">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
			   <% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>
			<% end_if %>

			<% if $PortfolioCategories.count %>
			<div class="col-md-12 text-center">
				<ul class="portfolio-filter nav nav-pills">
					<li class="nav-item"><a class="nav-link active" href="#" data-filter="*">All</a></li>
					<% loop $PortfolioCategories.sort('Title', 'ASC') %>
					<li class="nav-item"><a class="nav-link" href="#" data-filter=".portfolio-category-{$ID}">{$Title.XML}</a></li>
					<% end_loop %>
				</ul>
			</div>
			<% end_if %>

			<div class="clearfix"></div>

			<div class="isotope-container">
				<% loop $PortfolioItems %>
				<div class="col-sm-6 col-xs-12 col-md-4 col-lg-3 portfolio-item-wrapper <% if $Categories.count %><% loop $Categories %>portfolio-category-{$ID} <% end_loop %><% end_if %>">
					<a href="{$Link}" class="portfolio-item">
						<div class="portfolio-thumbnail">
							<img src="<% if $FeaturedImageID %>{$FeaturedImage.FocusFillMax(768,512).URL}<% else %>https://placehold.it/768x512<% end_if %>" class="img-responsive" alt="{$Title.XML}" >
						</div>

						<div class="portfolio-detail">
							<h4>$Title.XML</h4>

							<% if $Categories.count %>
							<p><% loop $Categories %>{$Title.XML}<% if not $Last %>, <% end_if %><% end_loop %></p>
							<% end_if %>
						</div>
					</a>
				</div>
				<% end_loop %>
			</div>
		</div>
	</div>
</div>
<% end_if %>
