<div class="block our-team overflow-hidden<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<% if $Heading || $Content %>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2 section-header text-center">
				<% if $Heading %>
					<h2 class="section-title">$Heading</h2>
				<% end_if %>
	
				<% if $Content %>
					<div class="typography clearfix">$Content</div>
				<% end_if %>
			</div>
		</div>
	</div>
	<% end_if %>

	<% if $StaffMembers %>
	<div class="container-fluid">
		<div class="row row-compact">
			<% loop $StaffMembers.sort('RelSort') %>
			<div class="col-md-3">
				<div class="person">
					<div class="person-thumb">
						<img
							src="<% if $PhotoID %>{$Photo.FocusFill(759,766).URL}<% else %>{$ThemeDir}/images/placeholder-avatar.jpg<% end_if %>"
							class="img-responsive"
							alt="{$Name.XML}"
						/>
	
						<div class="person-detail text-center">
							<% if $Biography %>
							<div class="staff-member-bio typography clearfix">
								$Biography.LimitCharactersToClosestWord(180)
							</div>
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
						<h5 class="name text-uppercase">$Name.XML</h5>
						<% if $JobTitle %><p>$JobTitle.XML</p><% end_if %>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
	<% end_if %>
</div>
