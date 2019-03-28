<% with $SiteConfig %>
<footer id="colophon" class="site-footer has-contacts" role="contentinfo">
	<% if $ContactPhone || $ContactEmail || $ContactAddress %>
    <div id="supplementary" class="widget-area">
        <div class="container">
		<div class="row">
			<% if $ContactPhone %>
			<div class="col-md-4">
				<aside class="widget text-center">
					<i class="fa fa-phone fa-3x"></i>
					<p class="lead">$ContactPhone.XML</p>
				</aside>
			</div>
			<% end_if %>

			<% if $ContactEmail %>
			<div class="col-md-4">
				<aside class="widget text-center">
					<i class="fa fa-envelope fa-3x"></i>
					<p class="lead">
						<a class="inherit-color" href="mailto:{$ContactEmail.XML}">$ContactEmail.XML</a>
					</p>
				</aside>
			</div>
			<% end_if %>

			<% if $ContactAddress %>
			<div class="col-md-4">
				<aside class="widget text-center">
					<i class="fa fa-home fa-3x"></i>
					<p class="lead">$ContactAddress</p>
				</aside>
			</div>
			<% end_if %>
		</div>
        </div>
    </div><!-- #supplementary -->
	<% end_if %>

    <% if $FooterContent %>
    <div class="site-info">
        <div class="container">
            $FooterContent
        </div>
    </div><!-- .site-info -->
	<% end_if %>
</footer><!-- #colophon -->
<% end_with %>
