<nav class="navbar navbar-light navbar-fixed-top yamm navbar-w-100">
	<div class="container-fluid">
		<div class="hidden-lg-up">
			<button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
			  &#9776;
			</button>
			<img class="logo" alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-dark.png" />
		</div>
		
		<div class="collapse navbar-toggleable-md" id="exCollapsingNavbar2">
			<a class="navbar-brand" href="{$BaseHref}"><img alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-dark.png" /></a>
			
			<% with $SiteConfig %>
				<% if $ContactPhone %>
				<div class="navbar-contact hidden-lg-down pull-md-right">
					<div class="display-table">
						<div class="icon display-table-cell">
							<i class="fa fa-phone fa-2x"></i>
						</div>
						
						<div class="detail display-table-cell">
							<span class="call-us"><%t HeaderSS.CallUsNow "Call Us Now!" %></span>
							<span class="contact-number">{$ContactPhone.XML}</span>
						</div>
					</div>
				</div>
				<% end_if %>
				
				<% if $SocialNetworks %>
				<ul class="list-inline pull-md-right hidden-lg-down social-icons social-icons-v2 social-icons-default">
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
		  
			<% include HeaderNavigation %>
		</div>
	</div>
</nav>

<div class="fake-navbar"></div>
