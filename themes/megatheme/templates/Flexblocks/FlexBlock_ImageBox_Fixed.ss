<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <% if $Boxes.count %>
            <% loop $Boxes.sort(SortOrder) %>
                <div class="bx bx-image col-md-6">
                    <img src="$Image.URL" alt="image" />
                </div>
            <% end_loop %>
			<% end_if %>
        </div>
    </div>
</div>
