<div class="page-header text-white" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-heading">
					<% if $Query %>
					   <%t Page.SearchResultForQuery "Search results for &quot;{query}&quot;" query=$Query %>
					<% else %>
					   <%t Page.SearchHeading "Search" %>
					<% end_if %>
				</h1>
            </div>
            <div class="col-md-6">
                $breadcrumbs
            </div>
        </div>
    </div>
</div>

<div id="wrapper" class="wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <section class="block block-result-list">
					<div class="container">
						<% if $Results %>
						<ul class="result-list no-list">
							<% loop $Results %>
							<li class="result-item">
								<h4>
									<a href="$Link">
										$Title
									</a>
								</h4>

								<% if $Content %>
									<p>$Content.LimitWordCountXML</p>
								<% end_if %>

								<a class="readMoreLink" href="$Link" title="Read more about &quot;{$Title}&quot;">
									<%t Page.SearchResultReadMore "Read more about &quot;{title}&quot;..." title=$Title %>
								</a>
							</li>
							<% end_loop %>
						</ul>

						<div class="rl-pagination">
							<% with $Results %>
								<% include Pagination %>
							<% end_with %>
						</div>
						<% else %>
						<p><%t Page.NoSearchResults "Sorry, your search query did not return any results." %></p>
						<% end_if %>
                    </div>

					<div class="container bottom-search-form">
						<div class="pad-top-30"></div>
						<% if $Query && $Results %>
						<p class="text-center"><%t Page.SearchNotGettingExpectedResults "Not getting the results you're looking for? Try another search by using the below form." %></p>
						<% end_if %>
						<div class="search-form">$SearchForm</div>
					</div>
                </section>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>
