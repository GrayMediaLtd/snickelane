<div id="breadcrumb" class="clearfix">
    <% if $Level(2) %>
        $Breadcrumbs
    <% else %>
    <ol class="breadcrumb hidden-xs">
        <li>
            <a href="{$BaseHref}" title="{$SiteConfig.Title}"><i class="fa fa-home"></i></a>
        </li>
        
        <li class="active">
            <% if $Query %> Search <% else %> $MenuTitle.XML <% end_if %>
        </li>
    </ol>
    <% end_if %>
</div>