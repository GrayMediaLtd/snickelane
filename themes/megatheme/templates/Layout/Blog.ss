$setCustomAssets(components/jscroll/jscroll.min.js, js)
$setCustomAssets(javascripts/blog-homepage.js, js)

<div class="page-header" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row page-intro">
            <div class="col-xs-12">
                <h1 class="page-heading">$FinalPageHeading.XML</h1>
				
				<% if $ArchiveYear %>
				<p class="hidden-sm-down">
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
				<p class="hidden-sm-down">
					<%t Blog.Tag 'Tag' %>: $CurrentTag.Title
				</p>
				<% else_if $CurrentCategory %>
				<p class="hidden-sm-down">
					<%t Blog.Category 'Category' %>: $CurrentCategory.Title
				</p>
				<% else_if $Action = 'profile' %>
				<p class="hidden-sm-down">
					<%t Blog.DisplayingPostedBy 'Displaying entries posted by {name}' name=$CurrentProfile.Name %>
				</p>
				<% else_if $PageIntroduction %>
				<p class="hidden-sm-down">
					$PageIntroduction
				</p>
				<% end_if %>
            </div>
			
            <div class="col-xs-12 hidden-sm-down">
                $Breadcrumbs
            </div>
        </div>
    </div>
</div>

<div id="wrapper" class="container blog-listing p-t-1">
    <div id="content" class="site-content">
        <div class="row">
            <div class="<% if $SideBarView %>col-md-9 push-md-3<% else %>col-xs-12<% end_if %>">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
						<section class="block block-blog">
                            <div class="blog-infinitelist">
								<% if $PaginatedList.Exists %>
									<% loop $PaginatedList %>
										<% include BlogPostSummary %>
									<% end_loop %>
								<% else %>
									<p><%t Blog.NoPosts 'There are no posts' %></p>
								<% end_if %>
								
								<% if $InfiniteList_NextLink %>
								<a class="clearfix display-block next-page text-right" href="{$InfiniteList_NextLink}">
									<span class="btn btn-primary btn-block-xs">
										<%t Blog.InfiniteListLinkLabel "Load more posts" %>
									</span>
									
									<span class="display-block pad-top-50"></span>
								</a>
								<% end_if %>
							</div>
							
							<% if not $InfiniteList_NextLink %>
							<% with $PaginatedList %>
								<% include Pagination %>
							<% end_with %>
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
