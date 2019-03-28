<% if $Clients %>
<div class="block block-partners<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <% if $Heading || $Content %>
        <div class="section-header">
            <% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
            <% if $Content %><div class="typography lead">$Content</div><% end_if %>
        </div>
        <% end_if %>
        <div class="row">
            <% loop $Clients %>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <a class="client" href="{$URL}" target="_blank" rel="nofollow">
                    <% if $LogoID %>
                    <img src="{$Logo.ScaleMaxWidth(1000).URL}" alt="{$Title.XML}" />
                    <% else %>
                    $Title.XML
                    <% end_if %>
                </a>
            </div>
            <% end_loop %>
        </div>
    </div>
</div>
<% end_if %>
