<!-- Latest-->
<% if $Banners.count %>
<div
	id="block-{$ID}"
    class="carousel banner-carousel tscarousel slide {$HTMLClasses}"
	data-ride="carousel"
	data-interval="4000"
	data-btn-img-next="{$ThemeDir}/images/arrow/slide-right.png"
	data-btn-img-prev="{$ThemeDir}/images/arrow/slide-left.png"
	data-heights='{$JsonHeights}'
>
	<!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
		<% loop $Banners.sort(SortOrder) %>
		<!--
		<div class="carousel-item <% if $First %>active<% end_if %>" data-dark-image="{$DarkImage}" <% if $ImageID %>style="background-image: url({$Image.URL});"<% end_if %>>
		-->
		<div class="carousel-item <% if $First %>active<% end_if %>" data-dark-image="{$DarkImage}" 
			<% if $ImageID %>
				<% with $Image %>
				style="background-image: url({$URL}); background-position: $PercentageX% $PercentageY%; background-size: cover;"
				<% end_with %>
			<% end_if %>>
			<div class="overlay"></div>
			<div class="carousel-caption {$Align}">
                <div class="container">
                    <div class="display-table">
                        <div class="display-table-cell align-middle">
							<% if $Title %>
							<h2 class="bc-heading <% if not $TitleClass %>bc-heading-default<% end_if %>" <% if $TitleColor %>style="color: #{$TitleColor.XML};"<% end_if %> >
								<% loop $Title.str2List(br) %>
								<span class="{$TitleClass}">{$Text}</span>
								<% end_loop %>
							</h2>
							<% end_if %>
							
							<% if $SubHeading %>
							<h3 class="bc-subheading <% if not $SubHeadingClass %>bc-subheading-default<% end_if %>" <% if $SubHeadingColor %>style="color: #{$SubHeadingColor.XML};"<% end_if %> >
								<% loop $SubHeading.str2List(br) %>
								<span class="{$SubHeadingClass}">{$Text}</span>
								<% end_loop %>
							</h3>
							<% end_if %>
							
							<% if $Content %>
                            <div class="bc-content <% if not $ContentClass %>bc-content-default<% end_if %>" <% if $ContentColor %>style="color: #{$ContentColor.XML};"<% end_if %>>
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
	
	<% if $Banners.count > 1 %>
	<ol class="carousel-indicators">
		<% loop $Banners %>
		<li data-target="#banner-carousel-{$Top.ID}" data-slide-to="{$Pos(0)}" <% if $First %>class="active"<% end_if %> ></li>
		<% end_loop %>
	</ol>
	
	<a class="left carousel-control" role="button" data-slide="prev" href="#">
		<i class="fa fa-chevron-left" aria-hidden="true"></i>
		<span class="sr-only">Previous</span>
	</a>
	
	<a class="right carousel-control" role="button" data-slide="next" href="#">
		<i class="fa fa-chevron-right" aria-hidden="true"></i>
		<span class="sr-only">Next</span>
	</a>
	<% end_if %>
</div>
<% end_if %>
