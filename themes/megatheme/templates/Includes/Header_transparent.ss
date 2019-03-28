<nav class="navbar navbar-light navbar-fixed-top yamm nabvar-transparent">
	<div class="container">
		<div class="hidden-lg-up">
			<button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
				&#9776;
			</button>
			
			<img class="logo" alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-dark.png" />
		</div>
		
		<div class="collapse navbar-toggleable-md" id="exCollapsingNavbar2">
			<a class="navbar-brand" href="{$BaseHref}">
				<img class="logo-dark" alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-dark.png" />
				<img class="logo-white" alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-white.png" />
			</a>
			
			<% include HeaderNavigation %>
		</div>
	</div>
</nav>