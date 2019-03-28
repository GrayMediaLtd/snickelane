<% if $EnableHeader %>
<div class="page-header" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-heading">$FinalPageHeading.XML</h1>
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

<div id="wrapper" class="wrapper register-wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <section class="block block-v11 block-register background-v1">
                    <div class="container">
                        <div class="row no-margin-top-for-headings">
                            <div class="col-md-6">
                                <div class="well-wrapper">
									<div class="well first well-v5 r-form" data-mh="register-col">
										<div class="primary-content typography">
											<% if $Content %>
												$Content
											<% else %>
												<h2 class="section-title">
													<%t MemberProfiles.LOGINHEADER "Log in" %>
												</h2>

												<p>
													<%t MemberProfiles.LOGIN "If you already have an account, you can
													<a href='{loginLink}'>log in here</a>." loginLink=$LoginLink %>
												</p>
											<% end_if %>
										</div>
									</div>
								</div>
                            </div>

                            <div class="col-md-6">
                                <div class="well-wrapper">
									<div class="r-form" data-mh="register-col">
                                        <h2 class="section-title">
											<%t MemberProfiles.REGISTER "Register" %>
										</h2>

										<div class="clearfix primary-form register-form">
											$Form
										</div>
                                    </div>
								</div>
                            </div>
                        </div>
                    </div>
                </section>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>
