<div
	class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}"
	<% if $Image.ID %>style="background-image: url($Image.URL); background-size:cover; position:relative;"<% end_if %>
>
    <div id="flexblock-carousel-{$ID}" class="carousel carouel-comp slide" data-ride="carousel">
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
            <blockquote class="carousel-item<% if $First %> active<% end_if %> blockquote testi-comp">
                <div class="detail">
                    <p>$Message</p>
                    <footer>
                        $Name
                        <% if $Company || $JobTitle %>
                            <cite title="{$Company.XML}"><% if $JobTitle %>{$JobTitle}, <% end_if %>$Company.XML</cite>
                        <% end_if %>
                    </footer>
                </div>
            </blockquote>
            <% end_loop %>
            <% end_if %>
        </div>
    </div>
</div>
