<% if not $isPreview %>
<div class="clearfix comment-author-meta">
	<img class="gravatar" src="<% if $Gravatar %>$Gravatar.ATT<% else %>https://placehold.it/60<% end_if %>" alt="Gravatar for $Name.ATT" title="Gravatar for $Name.ATT" />

	<div class="info" id="$Permalink">
		<div>
			<% if $URL %>
			<a class="author" href="$URL.URL" rel="nofollow" target="_blank">$AuthorName.XML</a>
			<% else %>
				<span class="author">$AuthorName.XML</span>
			<% end_if %>
		</div>
		
		<div class="comment-time">
			<% _t('CommentsInterface_singlecomment_ss.PostedOn','Posted on') %> 
			<span class="date">$Created.Nice ($Created.Ago)</span>
		</div>
	</div>
</div>
<% end_if %>

<div class="clearfix comment-text<% if $Gravatar %> hasGravatar<% end_if %>" id="<% if $isPreview %>comment-preview<% else %>$Permalink<% end_if %>">
	$EscapedComment
</div>

<% if not $isPreview %>
	<% if $ApproveLink || $SpamLink || $HamLink || $DeleteLink || $RepliesEnabled %>
		<div class="comment-action-links clearfix">
			<% if $RepliesEnabled %>
				<div class="pull-left">
					<a class="comment-reply-link" href="#{$ReplyForm.FormName}">
						<% _t('CommentsInterface_singlecomment_ss.Reply','Reply') %> 
					</a>
				</div>
			<% end_if %>
			
			<div class="comment-moderation-options pull-right">
				<% if $ApproveLink %>
					<a href="$ApproveLink.ATT" class="approve"><% _t('CommentsInterface_singlecomment_ss.APPROVE', 'approve it') %></a>
				<% end_if %>
				<% if $SpamLink %>
					<a href="$SpamLink.ATT" class="spam"><% _t('CommentsInterface_singlecomment_ss.ISSPAM','spam it') %></a>
				<% end_if %>
				<% if $HamLink %>
					<a href="$HamLink.ATT" class="ham"><% _t('CommentsInterface_singlecomment_ss.ISNTSPAM','not spam') %></a>
				<% end_if %>
				<% if $DeleteLink %>
					<a href="$DeleteLink.ATT" class="delete"><% _t('CommentsInterface_singlecomment_ss.REMCOM','reject it') %></a>
				<% end_if %>
			</div>
		</div>
	<% end_if %>

	<% include CommentReplies %>
<% end_if %>
