<% include Banners %>

<div id="wrapper" class="wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
				<% if $FlexBlocks %>
					<% loop $FlexBlocks.sort(SortOrder) %>
						$forTemplate
					<% end_loop %>
				<% end_if %>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>