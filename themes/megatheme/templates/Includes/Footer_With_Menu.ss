<% with $SiteConfig %>
<footer class="site-footer">
    <div id="supplementary" class="widget-area">
        <div class="container">
        <div class="row">
            <% loop $FooterWidgets.Widgets %>
            <div class="col-md-3">
                $WidgetHolder
            </div>
            <% end_loop %>
        </div>
        </div>
    </div><!-- #supplementary -->

	<% if $FooterContent %>
    <div class="site-info">
        <div class="container">
            <div class="typography">$FooterContent</div>
        </div>
    </div><!-- .site-info -->
	<% end_if %>
</footer>
<% end_with %>
