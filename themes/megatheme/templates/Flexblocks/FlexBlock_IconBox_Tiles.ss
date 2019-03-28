<% if $Boxes.count %>
<div class="<% if $HTMLClasses %>{$HTMLClasses}<% else %>block p-t-0 p-b-0<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<% if $Heading || $Content %>
    <div class="container">
		<div class="section-header text-center">
			<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
			<% if $Content %><div class="typography lead">$Content</div><% end_if %>
		</div>
	</div>
	<% end_if %>

	<div class="row no-gutter">
		<% loop $Boxes.sort(SortOrder) %>
		<div class="col-md-4">
			<div class="iconbox bg-brand-third iconbox-win-tile" data-mh="flexbox-iconbox-{$Top.ID}">
			<% if $Link %>
			<a
				href="{$Link}"
				class="share-box <% if $LinkBehaviour == 4 %>btn-open-lightbox<% end_if %> {$Title.XML}"
				<% if $LinkBehaviour == 4 %>
				rel="nofollow"
				<% else_if $LinkBehaviour == 3 %>
				target="_blank" rel="nofollow"
				<% else_if $LinkBehaviour == 2 %>
				rel="nofollow"
				<% else_if $LinkBehaviour == 1 %>
				target="_blank"
				<% end_if %>
			>
				<% if $IconClass %><i class="fa {$IconClass}"></i><% end_if %>
			</a>
			<% else %>
			<i class="{$HTMLClasses}"></i>
			<% end_if %>
			</div>
		</div>
		<% end_loop %>
	</div>
</div>
<% end_if %>
