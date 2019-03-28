<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName} block-blog-post" id="block-{$ID}">
	<div class="container">
		<% if $Heading || $Content %>
		<div class="section-header">
			<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
			<% if $Content %><div class="typography lead">$Content</div><% end_if %>
		</div>
		<% end_if %>

		<% if $Boxes.count %>
		<div class="row">
			<% loop $Boxes.sort(SortOrder) %>
			<div class="col-md-4">
				<div class="textbox-grid">
					<% if $ImageID %>
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
								<img src="{$Image.FocusFill(400,200).URL}" class="img-responsive w-100" alt="{$Title.XML}" />
							</a>
						<% else %>
							<img src="{$Image.FocusFill(400,200).URL}" class="img-responsive" alt="{$Title.XML}" />
						<% end_if %>
					<% end_if %>

					<% if $Title %>
						<h3 data-mh="flexbox-textbox-title">
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
						</h3>
					<% end_if %>

					<% if $Content %>
					<div class="blog-post-summary typography" data-mh="flexbox-textbox-summary">
						$Content
					</div>
					<% end_if %>

					<% if $Link %>
					<p class="text-uppercase" style="margin-top: 12px">
						<a href="{$Link}"><%t FlexBlogTextBox.LearnMore "Learn more" %></a>
					</p>
					<% end_if %>
				</div>
			</div>
			<% end_loop %>
		</div>
		<% end_if %>
	</div>
</div>
