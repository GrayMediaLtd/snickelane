<% if $Banners %>
<div
	id="banner-carousel"
    class="carousel banner-carousel tscarousel slide"
	data-ride="carousel"
	data-interval="false"
	data-btn-img-next="{$ThemeDir}/images/arrow/slide-right.png"
	data-btn-img-prev="{$ThemeDir}/images/arrow/slide-left.png"
>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
		<% loop $Banners.sort(SortOrder) %>
		<div class="carousel-item <% if $First %>active<% end_if %>" <% if $ImageID %>style="background-image: url({$Image.URL});"<% end_if %>>
			<div class="carousel-caption {$Align}">
                <div class="container">
                    <div class="display-table">
                        <div class="display-table-cell align-middle">
							<% if $Title %>
							<h2 class="bc-heading" <% if $TitleColor %>style="color: #{$TitleColor.XML};"<% end_if %> >
								<span class="{$TitleClass}">$Title.XML</span>
							</h2>
							<% end_if %>

							<% if $SubHeading %>
							<h3 class="bc-subheading" <% if $SubHeadingColor %>style="color: #{$SubHeadingColor.XML};"<% end_if %> >
								<span class="{$SubHeadingClass}">$SubHeading.XML</span>
							</h3>
							<% end_if %>

							<% if $Content %>
                            <div class="bc-content" <% if $ContentColor %>style="color: #{$ContentColor.XML};"<% end_if %>>
							    <span class="{$ContentClass}">$Content</span>
				            </div>
							<% end_if %>

							<% if $Buttons.sort(BBSort) %>
							    <div class="btns bc-buttons">
									<% loop $Buttons %>
									<% if $Title.containString('scroll-btn') %>
										<span class="scroll-btn local-scroll">
											<a href="{$Link}">
												<span class="mouse"><span> </span></span>
											</a>
										</span>
									<% else %>
										<a
											href="{$Link}"
											title="{$Title.XML}"
											class="{$HTMLClasses} <% if $LinkBehaviour == 4 %>btn-open-lightbox<% end_if %>"
											$LinkBehaviourAttr
										>
											<% if $Title.containString('fa-') %>
											<i class="{$Title.XML}"></i>
											<% else %>
											<% if $IconClass %><i class="fa {$ParsedIconClass}"></i><% end_if %>
											$Title.XML
											<% end_if %>
										</a>
									<% end_if %>
									<% end_loop %>
								</div>
							<% end_if %>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<% end_loop %>
    </div>
</div>
<% end_if %>
