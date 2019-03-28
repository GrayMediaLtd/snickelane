<% if $Clients %>
<div class="block clients clt-reg<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <% if $Heading || $Content %>
                    <% if $Heading %><h2>$Heading.XML</h2><% end_if %>
                    <% if $Content %>
                        <p>$Content</p>
                    <% end_if %>
                <% else %>
                    <h2>Recent Partners</h3>
                    <p>Lorem ipsum dorlar sit amit</p>
                <% end_if %>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <% loop $Clients %>
                        <div class="col-sm-3 col-md-4 col-xs-6">
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
    </div>
</div>
<% end_if %>
