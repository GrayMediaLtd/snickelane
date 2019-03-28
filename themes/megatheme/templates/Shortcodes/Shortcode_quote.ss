<% if $message %>
<blockquote class="blockquote">
	<p>{$message}</p>
    <% if $author %><small class="muted">{$author}</small><% end_if %>
</blockquote>
<% end_if %>
