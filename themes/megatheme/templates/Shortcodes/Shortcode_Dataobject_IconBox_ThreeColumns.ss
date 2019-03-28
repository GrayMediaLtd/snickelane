<% if $Items %>
    <div class="row dataobject-shortcode-iconbox-wrapper dbo-sc-tpl-{$template}">
		<% loop $Items %>
		<div class="col-md-4" data-mh="flexbox-iconbox">
			<div class="iconbox iconbox-v5">
				<% if $HTMLClasses %>
				<div class="iconbox-icon js-circle-box" data-circle-padding="50"><div><i class="{$HTMLClasses}"></i></div></div>
				<% end_if %>
				
				<div class="iconbox-content">
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
		</div>
		<% end_loop %>
	</div>
<% end_if %>
