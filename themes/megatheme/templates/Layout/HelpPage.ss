<div class="page-header" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-heading">$FinalPageHeading.XML</h1>

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
            </div>
            <div class="col-md-6">
                $breadcrumbs
            </div>
        </div>
    </div>
</div>

<div id="wrapper" class="container blog-listing">
    <div id="content" class="site-content">
        <div class="row">
            <div class="<% if $SideBarView %>col-md-9 push-md-3<% else %>col-xs-12<% end_if %>">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
						<section class="block block-help-center">
                            <% if $PaginatedList.Exists %>
							    <% if $Action = 'index' %>
									<% loop $Categories %>
									<% if $BlogPosts %>
									<div class="help-article-lists {$FirstLast}">
										<h3 class="accordion-heading"><span>$Title.XML</span></h3>
										
										<div class="panel-group" id="accordion-{$ID}">
											<% loop $BlogPosts %>
											<div class="panel panel-default">
												<div class="panel-heading simple-accordion-heading" id="accordion-heading-{$Up.ID}-{$ID}">
													<h4 class="panel-title">
														<a data-parent="#accordion-{$Up.ID}" href="#accordion-item-{$Up.ID}-{$ID}" aria-controls="accordion-item-{$Up.ID}-{$ID}">
															$Title.XML
														</a>
													</h4>
												</div>
												
												<div id="accordion-item-{$Up.ID}-{$ID}" class="panel-collapse collapse" aria-labelledby="accordion-heading-{$Up.ID}-{$ID}">
													<div class="panel-body">
														<p>
															<% if $Summary %>
																$Summary
															<% else %>
																$Excerpt
															<% end_if %>
														</p>
														
														<p><a class="btn btn-primary btn-sm" href="{$Link}"><%t BlogPostSummary.ReadMore "Read more" %></a></p>
													</div>
												</div>
											</div>
											<% end_loop %>
										</div>
									</div>
									<% end_if %>
									<% end_loop %>
								<% else %>
									<div class="help-article-lists no-heading first">
										<div class="panel-group" id="accordion-help-category" role="tablist" aria-multiselectable="true">
											<% loop $PaginatedList %>
											<div class="panel panel-default">
												<div class="panel-heading simple-accordion-heading" role="tab" id="accordion-heading-{$ID}">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion-help-category" href="#accordion-item-{$ID}" aria-controls="accordion-item-{$ID}">
															$Title.XML
														</a>
													</h4>
												</div>
												
												<div id="accordion-item-{$ID}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-heading-{$ID}">
													<div class="panel-body">
														<p>
															<% if $Summary %>
																$Summary
															<% else %>
																$Excerpt
															<% end_if %>
														</p>
														
														<p><a class="btn btn-primary btn-sm" href="{$Link}"><%t BlogPostSummary.ReadMore "Read more" %></a></p>
													</div>
												</div>
											</div>
											<% end_loop %>
										</div>
										
										<% with $PaginatedList %>
											<% include Pagination %>
										<% end_with %>
									</div>
								<% end_if %>
							<% else %>
								<p><%t HelpPage.NoArticle 'There are no articles.' %></p>
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