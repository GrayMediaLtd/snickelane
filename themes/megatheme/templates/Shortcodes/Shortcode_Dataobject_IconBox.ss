<% if $Items %>
    <div class="row dataobject-shortcode-iconbox-wrapper">
		<% loop $Items %>
		<div class="col-md-6" data-mh="flexbox-iconbox">
			<div class="service-box v2">
				<% if $HTMLClasses %>
				<div class="service-icon">
					<i class="{$HTMLClasses}"></i>
				</div>
				<% end_if %>
				
				<div class="service-detail">
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
	</div>
<% end_if %>