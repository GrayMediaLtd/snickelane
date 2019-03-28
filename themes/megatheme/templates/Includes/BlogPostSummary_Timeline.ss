<article id="post-{$ID}" class="post-{$ID} hentry">
	<% if $FeaturedImageID %>
	<div class="entry-thumbnail">
		<a href="{$Link}">
			<img src="{$FeaturedImage.FocusFill(1024,350).URL}" alt="{$Title.XML}" class="img-responsive" />
		</a>
	</div>
	<% end_if %>

	<header class="entry-header">
		<h2 class="entry-title h3">
			<a href="$Link" title="<%t Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
				<% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %>
			</a>
		</h2>

		<% include BlogPostMeta SimpleDate=1 %>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p>
			<% if $Summary %>
			$Summary
		<% else %>
			$Excerpt
		<% end_if %>
		</p>

		<p><a class="btn btn-brand-third btn-rounded" href="{$Link}"><%t BlogPostSummary.ReadMore "Read more" %></a></p>
	</div>
	<!-- .entry-content -->
</article>
