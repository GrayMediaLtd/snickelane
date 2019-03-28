<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="row no-gutter equalizer-wrapper">
        <% if $Boxes.count %>
        <% loop $Boxes.sort(SortOrder) %>
        <div class="bx bx-color col-md-3 bg-primary">
            <div class="bx-inner">
                <div class="icon">
                    <i class="fa fa-building-o"></i>
                </div>
                <div class="detail">
                    <h3 class="bx-title">$Title.XML</h3>
                    <p>
                        $Content
                    </p>
                </div>
            </div>
        </div>
        <% end_loop %>
        <% end_if %>
    </div>
</div>
