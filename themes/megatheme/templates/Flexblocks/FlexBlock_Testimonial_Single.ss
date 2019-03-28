<div class="block block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
    <div class="container">
        <div class="tes-inner owl-single">
            <% if $Testimonials.count %>
            <% loop $Testimonials.sort(SortOrder) %>
            <blockquote class="blockquote tes-single">
                <img src="$Photo.FocusFill(100,100).URL" class="avatar" alt="avatar" />
                <p>$Message</p>
                <footer>
                    $Name
                    <% if $Company || $JobTitle %>
                        <cite title="{$Company.XML}"><% if $JobTitle %>{$JobTitle}, <% end_if %>$Company.XML</cite>
                    <% end_if %>
                </footer>
            </blockquote>
            <% end_loop %>
            <% end_if %>
        </div>
    </div>
</div>
