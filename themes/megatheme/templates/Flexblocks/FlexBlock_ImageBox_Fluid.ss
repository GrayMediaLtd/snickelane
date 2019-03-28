<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <% if $Boxes.count %>
        <% loop $Boxes.sort(SortOrder) %>
            <div class="bx bx-image">
                <img src="$Image.URL" alt="image" />
            </div>
        <% end_loop %>
    <% end_if %>
</div>
