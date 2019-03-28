<div class="block<% if $HTMLClasses %> $HTMLClasses<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<div class="row">
			<% if $Heading || $Content %>
			<div class="col-md-7">
				<% if $Heading %><h2>$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography">$Content</div><% end_if %>
			</div>
			<% end_if %>

			<% if $Boxes.count %>
			<div class="<% if not $Heading && not $Content %>col-md-12<% else %>col-md-5<% end_if %>">
			    <% loop $Boxes.sort(SortOrder) %>
				<div class="iconbox iconbox-intro">
					<% if $IconClass %>
					<div class="iconbox-icon">
						<i class="fa {$IconClass}"></i>
					</div>
					<% end_if %>

					<div class="iconbox-detail">
						<% if $Title %>
							<h4 class="iconbox-title">
								<% if $Link %>
									<a
										href="{$Link}"
										class="inherit-color <% if $LinkBehaviour == 4 %>btn-open-lightbox<% end_if %>"
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
										$Title.XML
									</a>
								<% else %>
								    $Title.XML
								<% end_if %>
							</h4>
						<% end_if %>
						<% if $Content %><p>$Content.NoHTML</p><% end_if %>
					</div>
				</div>
				<% end_loop %>
			</div>
		    <% end_if %>
		</div>
	</div>
</div>
