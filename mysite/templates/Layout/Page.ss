<% if $EnableHeader %>
<div class="page-header" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row page-intro">
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

<div id="wrapper" class="wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <section class="block">
                    <div class="container">
                        <div class="primary-content typography">
							$Content
						</div>
						
						<% if $Form %>
						<div class="primary-form">
							$Form
						</div>
						<% end_if %>
                    </div>
                </section>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>
