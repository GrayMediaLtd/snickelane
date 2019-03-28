<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<div class="row">
			<% if $Heading || $Content %>
			<div class="section-header text-center col-sm-8 offset-sm-2">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>

			<div class="clearfix"></div>
			<% end_if %>

			<% if $Boxes.count %>
			<% loop $Boxes.sort(SortOrder) %>
		    <div class="col-md-4" data-mh="flexbox-textbox-big-heading">
				<div class="textbox textbox-big-heading">
					<div class="textbox-detail">
						<% if $Title %>
						<h3 class="textbox-title">
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

						<% if $Content %><div class="typography clearfix">$Content</div><% end_if %>
					</div>
				</div>
			</div>
			<% end_loop %>
			<% end_if %>
		</div>
	</div>
</div>
