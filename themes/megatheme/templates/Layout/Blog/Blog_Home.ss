$setCustomAssets(components/jscroll/jscroll.min.js, js)
$setCustomAssets(javascripts/blog-homepage.js, js)

<div class="page-header text-white" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>$FinalPageHeading.XML</h3>

				<% if $ArchiveYear %>
				<p>
					<%t Blog.Archive 'Archive' %>:
					<% if $ArchiveDay %>
						$ArchiveDate.Nice
					<% else_if $ArchiveMonth %>
						$ArchiveDate.format('F, Y')
					<% else %>
						$ArchiveDate.format('Y')
					<% end_if %>
				</p>
				<% else_if $CurrentTag %>
				<p>
					<%t Blog.Tag 'Tag' %>: $CurrentTag.Title
				</p>
				<% else_if $CurrentCategory %>
				<p>
					<%t Blog.Category 'Category' %>: $CurrentCategory.Title
				</p>
				<% else_if $Action = 'profile' %>
				<p>
					<%t Blog.DisplayingPostedBy 'Displaying entries posted by {name}' name=$CurrentProfile.Name %>
				</p>
				<% else_if $PageIntroduction %>
				<p>
					$PageIntroduction
				</p>
				<% end_if %>

				<% if $SiteConfig.SocialNetworks %>
				<ul class="list-inline social-icons social-icons-v2 social-icons-default">
					<% loop $SiteConfig.SocialNetworks %>
					<li class="social-{$Code}">
						<a href="{$URL}" target="_blank" rel="nofollow">
							<i class="fa fa-{$Code}"></i>
						</a>
					</li>
					<% end_loop %>
				</ul>
				<% end_if %>
            </div>
        </div>
    </div>
</div>

<div id="wrapper" class="wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <section class="block block-v11 odd">
                    <div class="container">
                        <div class="row blog-infinitelist">
							<% if $PaginatedList.Exists %>
								<% loop $PaginatedList %>
								<div class="col-md-4">
									<% include BlogPostSummary_Card %>
								</div>
								<% end_loop %>
							<% else %>
								<div class="col-xs-12"><%t Blog.NoPosts 'There are no posts' %></div>
							<% end_if %>

							<% if $InfiniteList_NextLink %>
							<a class="col-xs-12 next-page text-center" href="{$InfiniteList_NextLink}">
								<span class="btn btn-md btn-brand-third btn-rounded">
									<%t Blog.InfiniteListLinkLabel "Load more of my thoughts!" %>
								</span>
							</a>
							<% end_if %>
                        </div>
						<!-- end of .row -->

						<% if not $InfiniteList_NextLink %>
						<% with $PaginatedList %>
							<% include Pagination %>
						<% end_with %>
						<% end_if %>
                    </div>
                </section>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>
