<% if $BlogPosts %>
	<div class="block posts-grid g3 p-t-3 p-b-3 block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
		<div class="container">
			<div class="row">
				<% if $Heading || $Content %>
				<div class="section-header text-center col-sm-8 offset-sm-2">
					<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
					<% if $Content %><div class="typography lead">$Content</div><% end_if %>
				</div>
				<% end_if %>

				<% loop $BlogPosts %>
				<div class="col-md-6">
					<h3 class="entry-title" data-mh="flexblock-blogpost-title-{$Up.ID}"><a href="{$Link}">$Title.XML</a></h3>

					<div class="post-meta">
						<span class="post-date"><i class="fa fa-clock-o text-success"></i> $PublishDate.Ago <!-- $PublishDate.FormatI18N('%A, %d %B %Y %H:%M') --></span>

						<% if $Categories.exists %>
						<span class="post-categories">
							<i class="fa fa-bars text-success"></i>

							<% loop $Categories %>
								<a href="$Link" title="$Title">$Title</a><% if not Last %>, <% else %><% end_if %>
							<% end_loop %>
						</span>
						<% end_if %>

						<% if $Comments.exists %>
						<span class="post-comments">
							<i class="fa fa-comments text-success"></i>

							<a href="{$Link}#comments-holder">
								$Comments.count <%t Blog.Comments "Comments" %>
							</a>
						</span>
						<% end_if %>
					</div>

					<div class="home-blog-post-summary" data-mh="flexblock-blogpost-summary-{$Up.ID}">
						<% if $Summary %>
							$Summary
						<% else %>
							$Excerpt
						<% end_if %>
					</div>
				</div>
				<% end_loop %>
			</div>
		</div>
	</div>
<% end_if %>
