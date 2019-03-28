<% if $Boxes.count %>
<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<% if $Heading || $Content %>
		<div class="row">
			<div class="col-md-10 offset-md-1 section-header text-center">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>
		</div>
		<% end_if %>

		<div class="row">
			<% loop $Boxes.sort(SortOrder) %>
			<div class="col-md-4">
				<div class="iconbox iconbox-compact-circle">
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
								{$Title.XML}
							</a>
							<% else %>
							{$Title.XML}
							<% end_if %>
						</h4>
						<% end_if %>
						<p><% if $Content %><p>$Content.XML</p><% end_if %></p>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
<% end_if %>
