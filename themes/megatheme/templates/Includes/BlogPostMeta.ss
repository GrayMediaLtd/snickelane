<div class="entry-meta">
	<% if $Categories.exists %>
	    <span class="posted-in">
		   <i class="fa fa-list" aria-hidden="true"></i>
		   
			<% loop $Categories %>
				<a href="$Link" title="$Title">$Title</a><% if not Last %>, <% end_if %>
			<% end_loop %>
		</span>
	<% end_if %>
	
	<% if $Tags.exists %>
	    <span class="post-tags">
		<i class="fa fa-tags" aria-hidden="true"></i>
		<% loop $Tags %>
			<a href="$Link" title="$Title">$Title</a><% if not Last %>, <% end_if %>
		<% end_loop %>
		</span>
	<% end_if %>
	
	<span class="posted-on">
		<% if $SimpleDate %>
		    <a href="$MonthlyArchiveLink" rel="bookmark" class="date-circle">
				<span class="day">$PublishDate.Format(d)</span>
                <span class="month">$PublishDate.Format(M)</span>
			</a>
			
			<span class="hidden-date">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
				<a href="$MonthlyArchiveLink" rel="bookmark">$PublishDate.ago</a>
			</span>
		<% else %>
		    <i class="fa fa-clock-o" aria-hidden="true"></i>
		    <a href="$MonthlyArchiveLink" rel="bookmark">$PublishDate.ago</a>
		<% end_if %>
	</span>
	
	<% if $Credits %>
	    <span class="byline">
		<%t Blog.By "by" %>
		<% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %> and <% end_if %><% if $URLSegment %><a href="$URL" class="url fn n">$Name.XML</a><% else %>$Name.XML<% end_if %><% end_loop %>
		</span>
	<% end_if %>
	
	<% if $Comments.exists %>
		<span class="post-comment-link">
			<i class="fa fa-comments-o" aria-hidden="true"></i>
			
			<a href="{$Link}#comments-holder">
				$Comments.count
			</a>
		</span>
	<% end_if %>
</div><!-- .entry-meta -->
