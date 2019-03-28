<% if $Authors.count %>
<div class="blog-authors">
	<div class="sub-heading">
		<h3 class="sh-text"><%t Blog.AboutTheAuthor "About the author" %></h3>
	</div>
	
	<% loop $Authors %>
	<div class="blog-author clearfix">
		<div class="row">
			<% if $BlogProfileImageID && $BlogProfileImage.exists %>
			<div class="col-xs-2">
				<img src="{$BlogProfileImage.URL}" alt="{$Name.XML}" class="img-responsive" />
			</div>
			<% end_if %>
			
			<div class="<% if $BlogProfileImageID %>col-xs-10<% else %>col-xs-12<% end_if %>">
				<h4 class="author-name">$Name.XML</h4>
				
				<% if $BlogProfileSummary %>
				<div class="author-bio">$BlogProfileSummary</div>
				<% end_if %>
			</div>
		</div>
	</div>
	<% end_loop %>
</div>
<% end_if %>