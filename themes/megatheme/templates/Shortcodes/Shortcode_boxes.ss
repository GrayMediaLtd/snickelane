<div class="row features-block features-block_small service-box">
    <% loop $Boxes %>
    <div class="col-md-4 col-sm-6 math-height" data-mh="service-box">
        <div class="feature">
            <% if Title %>
            <h3>
                <% if HTMLClass %><i class="{$HTMLClass}"></i><% end_if %>
                
                <% if $LinkTo %>
                    <a href="{$LinkTo}" title="$Title.XML"
                        <% if $LinkBehaviour == 3 %>
                        target="_blank" rel="nofollow"
                        <% else_if $LinkBehaviour == 2 %>
                        rel="nofollow"
                        <% else_if $LinkBehaviour == 1 %>
                        target="_blank"
                        <% end_if %>
                    >
                        $Title.XML
                    </a>
                <% else %>
                    <span>
                        $Title.XML
                    </span>
                <% end_if %>
            </h3>
            <% end_if %>
            
            <p>
                $Content.XML
            </p>
        </div>
    </div>
    <% end_loop %>
</div> <!-- end of .features-block-->