<% if $EnableHeader %>
<div class="page-header" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-heading">$FinalPageHeading.XML</h1>
				
                <% if $PageIntroduction %>
				<p>$PageIntroduction</p>
				<% end_if %>
            </div>
			
            <div class="col-md-6">
                $Breadcrumbs
            </div>
        </div>
    </div>
</div>
<% else %>
<div class="page-header-blank"></div>
<% end_if %>

<div id="wrapper" class="wrapper buildable-page-wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
				<% if $Action = 'finished' %>
					<div class="container">
						<div class="block">
							<div class="typography primary-content">
								<% if $OnCompleteMessage %>$OnCompleteMessage<% else %>Your message has been submitted successfully. Thank you for contacting us.<% end_if %>
							</div>
						</div>
					</div>
				<% else %>
					<% if $FlexBlocks %>
						<% loop $FlexBlocks.sort(SortOrder) %>
							$Me
						<% end_loop %>
					<% end_if %>
				<% end_if %>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>