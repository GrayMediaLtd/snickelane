<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <% if $Boxes.count %>
    <div class="row no-gutter equalizer-wrapper">
        <% loop $Boxes.sort(SortOrder) %>
        <div class="bx bx-simple col-md-3">
            <div class="bx-inner">
                <% if $Title %>
                    <h3 class="bx-title">$Title.XML</h3>
                <% end_if %>
                <% if $Content %><div>$Content.NoHTML</div><% end_if %>
            </div>
        </div>
        <% end_loop %>
    </div>
    <% end_if %>
</div>
