<div class="block pricing-tables<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<% if $Heading || $Content %>
		<div class="row">
			<div class="col-md-10 offset-md-1 section-header text-center">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>
		</div>
		<% end_if %>

		<% if $Packages %>
		<div class="row">
			<% loop $Packages.sort(RelSort) %>
			<div class="col-md-4">
				<div class="pricing-table">
					<header class="pricing-table-header {$HTMLClasses}">
						<div class="pricing-table-name">$Title.XML</div>
						<% if $PriceAmount %>
						    <div class="pricing-table-price">
								<span class="ptp-currency">$Price.Currency</span><span class="ptp-amount">$Price.Amount</span>
							</div>
						<% end_if %>
						<% if $Unit %><div class="pricing-table-renew">$Unit</div><% end_if %>
					</header>

					<% if $Attributes %>
					<div class="pricing-table-content" data-mh="pricing-table-{$Top.ID}">
						<ul class="pricing-table-list">
							<% loop $Attributes %>
							<% if $Name || $Value %>
							<li>
								<% if $Name %><span class="ptl-name">{$Name.XML}:</span><% end_if %><% if $Value %><span class="ptl-value">{$Value.XML}</span><% end_if %>
							</li>
							<% end_if %>
							<% end_loop %>
						</ul>
					</div>
					<% end_if %>
					
					<% if $Buttons.sort(BBSort) %>
						<footer class="pricing-table-footer">
							<% loop $Buttons %>
							<a
								href="{$Link}"
								title="{$Title.XML}"
								class="{$HTMLClasses} <% if $LinkBehaviour == 4 %>btn-open-lightbox<% end_if %>"
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
								<% if $Title.containString('fa-') %>
								<i class="{$Title.XML}"></i>
								<% else %>
								<% if $IconClass %><i class="fa {$ParsedIconClass}"></i><% end_if %>
								$Title.XML
								<% end_if %>
							</a>
							<% end_loop %>
						</footer>
					<% end_if %>
				</div>
			</div>
			<% end_loop %>
		</div>
		<% end_if %>
	</div>
</div>
