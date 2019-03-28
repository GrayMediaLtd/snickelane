<% with $SiteConfig %>
<footer class="site-footer footer-centered">
    <div id="supplementary">
        <div class="container">
            <div class="row">
				<% if $SocialNetworks %>
                <div class="col-md-6">
                    <div class="widget">
                        <div class="row">
                            <div class="col-md-5">
                            <h5><%t FooterSS.FollowUs "Follow Us" %></h5>
                            </div>
                            <div class="col-md-7">
                            <ul class="list-inline social-icons social-icons-v2">
                                <% loop $SocialNetworks %>
                                <li class="social-{$Code}">
                                    <a href="{$URL}" target="_blank" rel="nofollow">
                                        <i class="fa fa-{$Code}"></i>
                                    </a>
                                </li>
                                <% end_loop %>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
				<% end_if %>

                <div class="col-md-6">
                    <div class="widget">
                        <div class="row">
                            <div class="col-md-5">
                            <h5><%t FooterSS.GetTheNewsletter "Get the newsletter" %></h5>
                            </div>
                            <div class="col-md-7">
                            <% with $Up.SubscribeForm %>
                                <% include SubscribeForm %>
                            <% end_with %>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <% if $FooterContent %>
    <div class="site-info">
        <div class="container">
            $FooterContent
        </div>
    </div><!-- .site-info -->
	<% end_if %>
</footer>
<% end_with %>
