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

<div id="wrapper" class="wrapper timeline-event-wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <section class="block block-v4">
                    <div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-3 timeline-sidebar">
								<% if $Parent.BlogPosts.Count > 1 %>
								<div class="widget wh-TimlineRecentWidget clearfix ">
									<h3 class="widget-title"><%t TimelineEventMoreEvent "More Events" %></h3>

									<div class="widget-content clearfix">
										<div>
											<div class="widget_links">
												<ul>
													<% loop $Parent.BlogPosts %>
														<li>
															<a href="{$Link}" title="{$Title.XML}">
																{$Title.XML}
															</a>
														</li>
													<% end_loop %>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!-- end of .wh-TimlineRecentWidget -->
								<% end_if %>
							</div>

							<div class="col-xs-12 col-sm-9">
								<h2 class="tle-heading">$Title.XML</h2>

								<div class="tle-meta"><small class="muted"><i class="glyphicon glyphicon-time"></i> $PublishDate.FormatI18N("%H:%I, %d %B %Y")</small></div>

								<% if $VideoID %>
								<div class="timeline-thumbnail timeline-video">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe
											webkitallowfullscreen mozallowfullscreen allowfullscreen
										<% if $VideoService == 'Youtube' %>
											src="//www.youtube.com/embed/{$VideoID}"
										<% else_if $VideoService == 'Vimeo' %>
											src="//player.vimeo.com/video/{$VideoID}?title=0&amp;byline=0&amp;portrait=0"
										<% end_if %>
										>
										</iframe>
									</div>
								</div>
								<% else_if $FeaturedImageID %>
								<div class="timeline-thumbnail">
									<img src="{$FeaturedImage.FocusFill(1024,350).URL}" alt="{$Title.XML}" class="img-responsive" />
								</div>
								<% end_if %>

								<div class="primary-content typography">
									$Content
								</div>
							</div>
						</div>
                    </div>
                </section>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>
