<!-- .ibox-  /scss/_iconbox-standard.scss -->

<div class="block block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
	<div class="container">
		<div class="row">
			<% if $Heading || $Content %>
			<div class="col-md-10 offset-md-1 section-header text-center">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>

			<div class="clearfix"></div>
			<% end_if %>

			<% if $Boxes.count %>
			<% loop $Boxes.sort(SortOrder) %>
			<div class="col-md-6" data-mh="flexbox-iconbox">
				<div class="iconbox iconbox-default">
					<% if $IconClass %>
					<div class="iconbox-icon">
						<i class="fa {$IconClass}"></i>
					</div>
					<% end_if %>

					<div class="iconbox-detail">
						<% if $Title %>
						<h4>
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

						<% if $Content %><p>$Content.XML</p><% end_if %>
					</div>
				</div>
			</div>
			<% end_loop %>
			<% end_if %>
		</div>
	</div>
</div>
