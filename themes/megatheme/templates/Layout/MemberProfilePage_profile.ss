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

<div id="wrapper" class="wrapper login-wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <section class="block block-v11 background-v1">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="l-form">
									<% if $CanAddMembers %>
										<div class="text-right">
											<a href="{$Link(add)}">
												<i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                <%t MemberProfiles.ADDMEMBER 'Add Member' %>
											</a>
										</div>
									<% end_if %>

                                    <h2 class="section-title">
										<%t MemberProfiles.YOURPROFILE 'Your Profile' %>
									</h2>

									<% if $Content %>
									<div class="primary-content typography">$Content</div>
									<% end_if %>

                                    <div class="primary-form clearfix">
										$Form
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
