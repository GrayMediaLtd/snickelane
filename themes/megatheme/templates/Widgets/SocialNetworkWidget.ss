<% if $WidgetContent %>
<div class="wg-content">$WidgetContent</div>
<% end_if %>

<% with $SiteConfig %>
	<% if $SocialNetworks %>
	<ul class="list-inline social-icons social-icons-v2 social-icons-default">
		<% loop $SocialNetworks %>
		<li class="social-{$Code}">
			<a href="{$URL}" target="_blank" rel="nofollow">
				<i class="fa fa-{$Code}"></i>
			</a>
		</li>
		<% end_loop %>
	</ul>
	<% end_if %>
<% end_with %>