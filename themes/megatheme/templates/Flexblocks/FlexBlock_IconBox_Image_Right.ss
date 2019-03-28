<div class="block iconbox-image-right<% if $HTMLClasses %> $HTMLClasses<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="content col-md-6 <% if $HTMLClasses %> {$HTMLClasses} <% else %> p-t-2 p-b-2 p-r-3 p-l-3 <% end_if %>">
		<div class="container">
			<div class="header">
				<% if $Heading %><h2>$Heading.XML</h2><% end_if %>
				<% if $Content %><p>$Content</p><% end_if %>
			</div>
			<% if $Boxes.count %>
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
								{$Title.XML}
							</a>
							<% else %>
							{$Title.XML}
							<% end_if %>
						</h4>
						<% end_if %>

						<% if $Content %><p>$Content.NoHTML</p><% end_if %>
					</div>
				</div>
			<% end_loop %>
			<% end_if %>
		</div>
	</div>
	<div class="image col-md-6" style="background-image: url({$Image.URL})">
	</div>
</div>
