<a
	href="{$Link}"
	title="{$Title.XML}"
	class="btn {$HTMLClasses} <% if $LinkBehaviour == 4 %>btn-open-lightbox<% end_if %>"
	$LinkBehaviourAttr
>
	<% if $Title.containString('fa-') %>
	<i class="{$Title.XML}"></i>
	<% else %>
	<% if $IconClass %><i class="fa {$ParsedIconClass}"></i><% end_if %>
	$Title.XML
	<% end_if %>
</a>