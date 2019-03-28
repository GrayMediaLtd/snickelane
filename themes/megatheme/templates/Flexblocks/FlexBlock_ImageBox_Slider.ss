<!-- .ct-slider  /scss/_content-slider.scss -->
<div class="content-slider" id="block-{$ID}">
<div id="flexblock-carousel-{$ID}" class="carousel bg-faded carousel-fade slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <% if $Boxes.count %>
        <% loop $Boxes.sort(SortOrder) %>
            <li data-target="#flexblock-carousel-{$Top.ID}" data-slide-to="$Pos(0)"<% if $First %> class="active"<% end_if %>></li>
        <% end_loop %>
        <% end_if %>
    </ul>
    <div class="carousel-inner" role="listbox">
        <% if $Boxes.count %>
        <% loop $Boxes.sort(SortOrder) %>
        <div class="carousel-item <% if $First %>active<% end_if %>">
            <div class="carousel-caption">
                <h6 class="text-uppercase delay1 caption font-weight-bold" data-animation="animated fadeIn" style="left: 10%; top: 100px; z-index:2;">$Title.XML</h6>
                <p class="caption text-muted delay1" style="left: 10%; top: 135px; width: 350px; z-index:2;" data-animation="animated fadeIn">
                    Showcase your work with multiple presentations including full-screen, slideshows, lightbox, and more. You upload high-res images and set a focal point; we automatically create perfectly-cropped versions for every device.
                </p>
                <img class="caption delay2" src="$Image.URL" data-animation="animated fadeInUp" style="left: 25%; top: 0; z-index:2;" alt="image" />
                <img class="caption delay3" src="$ThemeDir/images/content/cs2.jpg" data-animation="animated fadeInUp" style="left: 25%; top: 0; z-index:1;" alt="image" />
            </div>
        </div>
        <% end_loop %>
        <% end_if %>
    </div>
</div>
</div>
