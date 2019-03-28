<% with $SiteConfig %>
<footer class="site-footer contains-widgets">
    <div id="supplementary" class="widget-area">
        <div class="container">
            <div class="footer-sidebar">
                <div class="row">
					<% loop $FooterWidgets.Widgets.limit(2) %>
					<div class="col-md-4">
						$WidgetHolder
					</div>
					<% end_loop %>
					
					<div class="col-md-4">
						<img src="{$ThemeDir}/images/argosy-logo.png" alt="Argosy" />
					</div>
                </div>
            </div><!-- .footer-sidebar -->
        </div>
    </div><!-- #supplementary -->

    <div class="site-info">
        <div class="container">
            <div class="row">
				<% if $FooterContent %>
				<div class="col-xs-12 col-md-6">
					<div class="typography">$FooterContent</div>
				</div>
				<% end_if %>
				
				<div class="col-xs-12 col-md-6">
					<% if $FooterLinks.count %>
						<ul class="footer-links">
						<% loop $FooterLinks.Items %>
							<li><a href="{$Link}">$MenuTitle.XML</a></li>
							<% if not $Last %>
							<li class="divider">|</li>
							<% end_if %>
						<% end_loop %>
							<li>
								<div id="google_translate_element"></div>
							</li>
						</ul>
					<% end_if %>
				</div>
			</div>
        </div>
    </div><!-- .site-info -->
</footer>
<% end_with %>
