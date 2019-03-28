<% if $BlogPosts %>
	<div class="block posts-grid posts-fixed-grid block-{$ClassName} {$HTMLClasses} block-blog-post" id="block-{$ID}">
		<div class="container">
			<% if $Heading || $Content %>
			<div class="section-header">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>
			<% end_if %>
			
			<div class="row">
				<% loop $BlogPosts %>
				<div class="col-md-4">
					<div class="post">
						<div class="entry-thumbnail">
							<a href="{$Link}">
								<img src="<% if $FeaturedImageID %>{$FeaturedImage.FocusFill(400,200).URL}<% else %>https://placehold.it/400x200<% end_if %>" class="img-fluid" alt="{$Title.XML}" />
							</a>
						</div>
						
						<div class="entry-header">
							<h3 class="entry-title" data-mh="flexblock-blogpost-title-{$Up.ID}"><a href="{$Link}" class="inherit-color">$Title.XML</a></h3>
						</div>
						
						<div class="entry-footer">
							<div class="post-meta">
								<span class="post-date"><i class="fa fa-clock-o text-success"></i> $PublishDate.Ago <!-- $PublishDate.FormatI18N('%A, %d %B %Y %H:%M') --></span>
								
								<% if $Comments.exists %>
								<span class="post-comments">
									<i class="fa fa-comments text-success"></i>
									<a href="{$Link}#comments-holder">
										$Comments.count <%t Blog.Comments "Comments" %>
									</a>
								</span>
								<% end_if %>
							</div>
						</div>
					</div>
				</div>
				<% end_loop %>
			</div>
		</div>
	</div>

<% end_if %>
