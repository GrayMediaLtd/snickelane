<% if $PageLayout = 'Blog_Home' %>
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
			<%t Blog_Home.InfiniteListLinkLabel "Load more of my thoughts!" %>
		</span>
	</a>
	<% end_if %>
<% else %>
	<% if $PaginatedList.Exists %>
		<% loop $PaginatedList %>
		    <% if $Top.PageLayout = 'Blog_Timeline' %>
				<% include BlogPostSummary_Timeline %>
			<% else %>
			    <% include BlogPostSummary %>
			<% end_if %>
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
<% end_if %>
