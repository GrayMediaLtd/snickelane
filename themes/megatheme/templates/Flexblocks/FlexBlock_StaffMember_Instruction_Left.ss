<% if $StaffMembers %>
<div class="block team-v3 <% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<div class="row">
			<% if $Heading || $Content %>
			<div class="col-md-6">
				<h2 class="h1">$Heading</h2>
				<div class="team-content typography">
					$Content
				</div>
			</div>
			<% end_if %>

			<div class="col-md-6">
				<div class="row">
					<% loop $StaffMembers.sort('RelSort') %>
					<div class="col-md-4">
						<div class="person">
							<div class="person-thumb">
								<img src="<% if $PhotoID %>{$Photo.FocusFill(512,512).URL}<% else %>{$ThemeDir}/images/placeholder-avatar.jpg<% end_if %>" alt="{$Name.XML}" class="img-responsive w-100" />
							</div>
						</div>
					</div>
					<% end_loop %>
				</div>
			</div>
		</div>
	</div>
</div>
<% end_if %>
