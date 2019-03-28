<article id="post-{$ID}" class="post-{$ID} hentry hentry-v2">
	<div class="entry-meta">
		<span class="posted-on">
			<time class="updated" datetime="{$PublishDate.Rfc3339}">
				<span class="month">$PublishDate.FormatI18N("%b")</span>
				<span class="day">$PublishDate.FormatI18N("%d")</span>
				<span class="year">$PublishDate.FormatI18N("%Y")</span>
			</time>
		</span>
	</div><!-- .entry-meta -->

	<div class="entry-thumbnail">
		<a href="{$Link}">
			<img src="<% if $FeaturedImageID %>{$FeaturedImage.FocusFill(800,500).URL}<% else %>//placehold.it/800x500<% end_if %>" alt="{$Title.XML}" class="img-responsive" />
		</a>
	</div>

	<div class="entry-header" data-mh="blog-card-entry-header">
		<h2 class="entry-title h3">
			<a href="$Link" title="<%t Blog.ReadMoreAbout "Read more about '{title}'..." title=$Title %>">
				<% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %>
			</a>
		</h2>
	</div>
	<!-- .entry-header -->

	<div class="entry-content">
		<p>
		<% if $Summary %>
			$Summary
		<% else %>
			$Content.LimitCharactersToClosestWord(120)
		<% end_if %>
		</p>

		<p><a class="btn btn-lg btn-success btn-transparent btn-round" href="{$Link}"><%t BlogPostSummary.ReadMore "Read more" %></a></p>
	</div>
	<!-- .entry-content -->
</article>
