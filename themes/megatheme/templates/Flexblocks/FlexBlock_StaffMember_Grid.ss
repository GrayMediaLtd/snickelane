<% if $StaffMembers %>
<div class="block our-team<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<div class="row">
			<% if $Heading || $Content %>
			<div class="col-sm-12 section-header text-center">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>

			<div class="clearfix"></div>
			<% end_if %>

			<% loop $StaffMembers.sort('RelSort') %>
				<div class="col-md-3">
					<div class="person">
						<div class="person-thumb">
							<img src="<% if $PhotoID %>{$Photo.URL}<% else %>{$ThemeDir}/images/placeholder-avatar.jpg<% end_if %>" alt="{$Name.XML}" class="img-responsive" />

							<% if $Biography %>
							<div class="person-detail text-center">
								$Biography.LimitCharactersToClosestWord(90)
							<% end_if %>

							<% if $Networks %>
								<ul class="list-inline social-icons social-icons-v2">
								<% loop $Networks %>
									<li class="social-{$Code}">
										<a href="{$URL}" target="_blank" rel="nofollow">
											<i class="fa fa-{$Code}"></i>
										</a>
									</li>
								<% end_loop %>
								</ul>
							<% end_if %>
							</div>
						</div>

						<div class="person-extra text-center">
							<h5 class="name text-uppercase">$Name</h5>
							<% if $JobTitle %><p>$JobTitle.XML</p><% end_if %>
						</div>
					</div>
				</div>
			<% end_loop %>
		</div>
	</div>
</div>
<% end_if %>
