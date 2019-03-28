<% with $SiteConfig %>
<% if $ContactPhone || $ContactEmail || $SocialNetworks %>
<div class="topbar">
    <div class="container">
        <div class="row">
			<% if $ContactPhone || $ContactEmail %>
            <div class="col-md-6">
                <ul class="list-inline">
                    <% if $ContactPhone %><li class="list-inline-item"><i class="fa fa-phone"></i> <%t HeaderSS.Phone "Phone: {phone}" phone=$ContactPhone %></li><% end_if %>
                    <% if $ContactEmail %><li class="list-inline-item"><i class="fa fa-envelope-o"></i> <a href="mailto:{$ContactEmail}"><%t HeaderSS.Email "Email: {email}" email=$ContactEmail %></a></li><% end_if %>
                </ul>
            </div>
			<% end_if %>

			<% if $SocialNetworks %>
            <div class="col-md-6">
                <ul class="social-icons text-md-right">
                    <% loop $SocialNetworks %>
                    <li class="social-{$Code}">
                        <a href="{$URL}" target="_blank" rel="nofollow">
                            <i class="fa fa-{$Code}"></i>
                        </a>
                    </li>
                    <% end_loop %>
                </ul>
            </div>
			<% end_if %>
        </div>
    </div>
</div>
<% end_if %>
<% end_with %>

<nav class="navbar navbar-light yamm navbar-flat">
  <div class="container">
  <div class="hidden-lg-up">
      <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
        &#9776;
      </button>
      <img class="logo" alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-dark.png">
  </div>
  <div class="collapse navbar-toggleable-md" id="exCollapsingNavbar2">
    <a class="navbar-brand" href="{$BaseHref}"><img alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-dark.png" /></a>
    <% include HeaderNavigation %>
  </div>
  </div>
</nav>
