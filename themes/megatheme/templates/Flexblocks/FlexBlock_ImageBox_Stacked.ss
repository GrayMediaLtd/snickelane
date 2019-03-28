<div class="block img-blk<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <% if $Boxes.count %>
            <% loop $Boxes.sort(SortOrder) %>
                <div class="col-md-6">
                    <div class="bx bx-image">
                        <img src="$Image.URL" alt="image" />
                    </div>
                </div>
            <% end_loop %>
            <% end_if %>
        </div>
    </div>
</div>
