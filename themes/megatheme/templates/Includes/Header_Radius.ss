<nav class="navbar navbar-light navbar-fixed-top yamm navbar-radius">
  <div class="container">
  <div class="hidden-lg-up">
      <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
        &#9776;
      </button>
      <img class="logo" alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-dark.png">
  </div>
  <div class="collapse navbar-toggleable-md" id="exCollapsingNavbar2">
    <a class="navbar-brand" href="{$BaseHref}"><img alt="{$SiteConfig.Title}" src="{$ThemeDir}/images/logo-dark.png" /></a>
    <% with $SiteConfig %>
        <% if $SocialNetworks %>
        <ul class="list-inline pull-md-right social-icons hidden-lg-down social-icons-v2 social-icons-default">
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
