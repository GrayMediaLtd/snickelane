<% if $Boxes.count %>
<div class="block block-{$ClassName} block-tpl-<% if $Template %>{$Template}<% else %>default<% end_if %> {$HTMLClasses} workbox-default" id="block-{$ID}">
    <div class="container">
		<% if $Heading %><h2 class="h3">$Heading.XML</h2><% end_if %>
		<% if $Content %><div class="lead">$Content</div><% end_if %>
		
        <div class="row row-workbox">
            <% loop $Boxes.sort(SortOrder) %>
            <div class="col-md-6 col-workbox">
                <a href="{$Link}" class="workbox" {$LinkBehaviourAttr}>
                    <% if $ImageID %>
    					<img src="{$Image.URL}" alt="{$Title.XML}" />
					<% end_if %>
					
                    <div class="detail">
                        <div class="make-center">
                            <div class="center">
                                <h3 class="bx-title">$Title.XML</h3>
								<div class="typography bx-content">$Content</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <% end_loop %>
        </div>
    </div>
</div>
<% end_if %>