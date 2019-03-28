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

<br/><br/><br/>
<div id="wrapper" class="wrapper timeline-wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
				<div class="container">
					<% if $Content %>
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="primary-content typography text-center lead">
								$Content
							</div>
						</div>
					</div>
					<div class="clearfix pad-top-15"></div>
					<% end_if %>

					<% if $EventList %>
						<ul class="timeline">
							<% loop $EventList %>
							<% loop $Events %>
							<li class="{$FirstLast}">
							    <% if $First %><div class="timeline-date">$Up.DateNice</div><% end_if %>

								<div class="timeline-badge"></div>

								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">
											<a href="{$Link}">$Title.XML</a>
										</h4>

										<p><small class="timeline-event-date"><i class="glyphicon glyphicon-time"></i> $PublishDate.ago</small></p>
									</div>

									<div class="timeline-body">
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

										<div class="typography clearfix">
											$Content
										</div>
									</div>
								</div>
							</li>
							<% end_loop %>
					        <% end_loop %>
						</ul>
					<% end_if %>

					<% with $PaginatedList %>
						<% include Pagination %>
					<% end_with %>

					<div class="clearfix pad-top-50"></div>
				</div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>
