<div class="block p-t-0 p-b-0 block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
    <div id="flexblock-carousel-{$ID}" class="carousel slide carousel-multi" data-ride="carousel">
        <ul class="carousel-indicators">
            <% if $Testimonials.count %>
            <% loop $Testimonials.sort(SortOrder) %>
                <li data-target="#flexblock-carousel-{$Top.ID}" data-slide-to="$Pos(0)"<% if $First %> class="active"<% end_if %>><img src="{$Photo.FocusFill(100,100).URL}" alt="avatar" /></li>
            <% end_loop %>
            <% end_if %>
        </ul>
        <div class="carousel-inner" role="listbox">
            <% if $Testimonials.count %>
            <% loop $Testimonials.sort(SortOrder) %>
            <blockquote class="carousel-item<% if $First %> active<% end_if %> blockquote tes-multi">
                <div class="detail">
                    <p>$Message</p>
                    <footer>
                        $Name
                        <% if $Company || $JobTitle %>
                            <cite title="{$Company.XML}"><% if $JobTitle %>{$JobTitle}, <% end_if %>$Company.XML</cite>
                        <% end_if %>
                    </footer>
                </div>
                <div class="avatar" style="background-image:url($Photo.FocusFill(100,100).URL);"></div>
            </blockquote>
            <% end_loop %>
            <% end_if %>
        </div>
    </div>
</div>
