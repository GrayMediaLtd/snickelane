<% if $Pages %>
	<ol class="breadcrumb hidden-xs">
		<li class="breadcrumb-item">
			<a href="{$BaseHref}" title="{$SiteConfig.Title}"><i class="fa fa-home"></i></a>
		</li>
		
		<% loop $Pages %>
			<% if $Last %>
				<li class="breadcrumb-item active">
					$MenuTitle.XML
				</li>
			<% else %>
				<li class="breadcrumb-item">
					<a href="$Link" class="breadcrumb-$Pos" title="{$Title.XML}">
						$MenuTitle.XML
					</a>
				</li>
			<% end_if %>
		<% end_loop %>
		</ol>
<% end_if %>
