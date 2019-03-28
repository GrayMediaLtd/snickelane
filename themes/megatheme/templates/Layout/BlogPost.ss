<div class="page-header" <% if $HeaderImage %>style="background-image: url('{$HeaderImage.URL}');"<% end_if %>>
    <div class="container page-intro">
        <h1 class="page-heading">$FinalPageHeading.XML</h1>
		
		<% if $PageIntroduction %>
		<p>
			$PageIntroduction
		</p>
		<% end_if %>
    </div>
</div>

<div id="wrapper" class="container blog-single">
    <div id="content" class="site-content <% if $HeaderImage %>p-t-3<% end_if %>">
        <div class="row">
            <div class="<% if $SideBarView %>col-md-9 push-md-3<% else %>col-xs-12<% end_if %>">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
						<section class="block block-blog">
                            <article id="post-{$ID}" class="post-{$ID} hentry">
								<% if $VideoID %>
								<div class="entry-thumbnail entry-video">
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
								<div class="entry-thumbnail">
									<img src="{$FeaturedImage.FocusFill(1024,350).URL}" alt="{$Title.XML}" class="img-responsive" />
								</div>
								<% end_if %>

								<header class="entry-header">
									<h2 class="entry-title h3">
										<a href="$Link" title="<%t Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
											<% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %>
										</a>
									</h2>

									<% include BlogPostMeta %>
								</header><!-- .entry-header -->

								<div class="entry-content primary-content typography">
									$Content
								</div><!-- .entry-content -->
							</article>

							<% include BlogAuthorDetails %>

							<% if $Form || $CommentsForm %>
							<div class="clearfix primary-form">
								$Form
	                            $CommentsForm
							</div>
							<% end_if %>
                        </section>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>

			<% if $SideBarView %>
            <div class="col-md-3 pull-md-9 blog-sidebar">
                <% include SideBar %>
            </div>
			<% end_if %>
        </div>
    </div><!-- #content -->
</div>
