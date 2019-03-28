<% if $BlogPosts %>
	<div class="block posts-grid carousel-grid block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
		<div class="container">
			<div class="section-header">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>

				<!-- Controls -->
				<div class="left carou_prev carousel-control flexblock-blogpost-{$ID}-prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</div>

				<div class="right carou_next carousel-control flexblock-blogpost-{$ID}-next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</div>
			</div>

			<div class="row">
				<div class="carou" data-carousel-name="flexblock-blogpost-{$ID}">
					<% loop $BlogPosts %>
					<div class="col-md-4">
						<div class="post">
							<div class="entry-thumbnail">
								<a href="{$Link}">
									<img src="<% if $FeaturedImageID %>{$FeaturedImage.FocusFill(400,200).URL}<% else %>https://placehold.it/400x200<% end_if %>" class="img-fluid" alt="{$Title.XML}" />
								</a>
							</div>
							
							<div class="entry-header">
								<h3 class="entry-title" data-mh="flexblock-blogpost-title-{$Up.ID}">
									<a href="{$Link}" class="inherit-color">$Title.XML</a>
								</h3>
								
								<div class="post-meta">
									<span class="post-date">
										<span class="month">$PublishDate.ShortMonth()</span>
										<span class="day">$PublishDate.DayOfMonth( )</span>
										<span class="year">$PublishDate.Year()</span>
									</span>
								</div>
							</div>
							
							<div class="entry-summary" data-mh="flexblock-blogpost-summary-{$Up.ID}">
								<% if $Summary %>
								   $Summary
								<% else %>
									$Excerpt
								<% end_if %>
							</div>
							<div class="entry-footer">
								<a href="{$Link}" class="btn btn-md btn-rounded btn-outline-brand-third"><%t FlexBlogBlogPost.LearnMore "Read More" %></a>
							</div>
						</div>
					</div>
					<% end_loop %>
				</div>
			</div>
		</div>
	</div>
<% end_if %>
