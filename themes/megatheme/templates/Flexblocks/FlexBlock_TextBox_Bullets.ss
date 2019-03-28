<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <% if $Heading %><h4>$Heading.XML</h4><% end_if %>
            </div>
            <div class="col-md-8">
                <ul class="row bx-bullets">
                    <% if $Boxes.count %>
                    <% loop $Boxes.sort(SortOrder) %>
                        <li class="col-md-6 bx">
                            <h4>$Title.XML</h4>
                            <p>$Content</p>
                        </li>
                    <% end_loop %>
        			<% end_if %>
                </ul>
            </div>
        </div>
    </div>
</div>
