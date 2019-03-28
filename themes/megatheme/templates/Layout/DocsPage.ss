<% if $EnableHeader %>
<div class="page-header" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row page-intro">
            <div class="col-md-6">
                <h1 class="page-heading">$FinalPageHeading.XML</h1>$FinalPageHeading.XML</h1>
				
                <% if $PageIntroduction %>
				<p>$PageIntroduction</p>
				<% end_if %>
            </div>
			
            <div class="col-md-6">
                $Breadcrumbs
            </div>
        </div>
    </div>
</div>
<% else %>
<div class="page-header-blank"></div>
<% end_if %>

<div id="wrapper" class="wrapper doc-page-wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="container block">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-gt" role="tab">Getting Started</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-blocks" role="tab">Blocks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-sg" role="tab">Style Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-hf" role="tab">Headers & Footers</a>
                        </li>
                    </ul>
					
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-gt" role="tabpanel">
							<div class="block">
						        <p>
									Watch this quick video tutorial introduction that teaches you how to build pages simply with Themestripe.
                                    <p><iframe width="853" height="480" src="https://www.youtube.com/embed/wAfp4TsYkcs" frameborder="0" allowfullscreen></iframe></p>
								</p>
							</div>
                        </div>
						
                        <div class="tab-pane" id="tab-blocks" role="tabpanel">
                            <div class="block">
                                <h3>Text Boxes</h3>
								
                                <h4>Default</h4>
                                <h6>TextBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Default</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/textbox-default.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Big Headings</h4>
                                <h6>TextBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Big Headings</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/textbox-big-heading.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Grid</h4>
                                <h6>TextBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Grid</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/textbox-grid.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Two columns</h4>
                                <h6>TextBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Two columns</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/textbox-two-columns.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Two full width columns</h4>
                                <h6>TextBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Two full width columns</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/textbox-two-full-width-columns.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Vertical Tabs</h4>
                                <h6>TextBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Vertical Tabs</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/textbox-vertical-tabs.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Horizontal Rounded Tabs</h4>
                                <h6>TextBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Horizontal Rounded Tabs</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/textbox-horizontal-rounded-tabs.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Simple</h4>
                                <h6>TextBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Simple</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/textbox-simple.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Icon Boxes</h3>
								
                                <h4>Introduction</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Introduction</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-introduction.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Statistic</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Statistic</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-statistic.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Three columns</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Three columns</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-three-columns.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Windows Tiles</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Windows Tiles</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-windows-tiles.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Compact Grid</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Compact Grid</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-compact-grid.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Big Rows</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Big Rows</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-big-rows.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Image on left side</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Image on left side</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-Image-on-left-side.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Image on right side</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Image on right side</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-image-on-right-side.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Three columns grid with circle</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Three columns grid with circle</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-three-columns-grid-with-circle.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Default</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Default</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-default.png" alt="SilverStripe Themes">
								<p>&nbsp;</p>
								
                                <h4>Squares</h4>
                                <h6>IconBox <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Squares</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/iconbox-squares.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Content Blocks</h3>
								
                                <h4>Standard</h4>
                                <h6>Content <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Standard</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/content-standard.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
								<h4>Image Right</h4>
                                <h6>Content <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Image Right</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/content-image-right.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
                                
								<h4>Image Left</h4>
                                <h6>Content <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Image Left</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/content-image-left.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
                                
								<h4>Strip</h4>
                                <h6>Content <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Strip</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/content-strip.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
                                
								<h4>Simple</h4>
                                <h6>Content <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Simple</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/content-simple.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Pricing</h3>
                                <h4>Default</h4>
                                <h6>Pricing <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Default</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/pricing-default.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Testimonials</h3>
								
                                <h4>Grid (3 Columns)</h4>
                                <h6>Testimonial <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Grid (3 Columns)</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/testimonial-grid.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Grid (2 Columns)</h4>
                                <h6>Testimonial <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Grid (2 Columns)</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/testimonial-grid-two-columns.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Single</h4>
                                <h6>Testimonial <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Single</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/testimonial-single.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Multiple</h4>
                                <h6>Testimonial <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Multiple</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/testimonial-multiple.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Single (Alternative)</h4>
                                <h6>Testimonial <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Single (Alternative)</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/testimonial-single-alternative.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Staff Members</h3>
								
                                <h4>Compact</h4>
                                <h6>Staff Member <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Compact</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/staff-compact.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Grid</h4>
                                <h6>Staff Member <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Grid</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/staff-grid.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Circle</h4>
                                <h6>Staff Member <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Circle</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/staff-circle.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Instruction Left</h4>
                                <h6>Staff Member <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Instruction Left</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/staff-instruction-left.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Social</h4>
                                <h6>Staff Member <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Social</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/staff-social.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Slider</h4>
                                <h6>Staff Member <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Slider</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/staff-slider.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Flip</h4>
                                <h6>Staff Member <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Flip</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/staff-flip.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Clients</h3>
								
                                <h4>Strip</h4>
                                <h6>Client <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Strip</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/client-strip.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Regular</h4>
                                <h6>Client <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Regular</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/client-regular.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Image Box</h3>
								
                                <h4>Single</h4>
                                <h6>Image Box <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Single</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/imagebox-single.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Full Width</h4>
                                <h6>Image Box <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Full Width</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/imagebox-full-width.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Grid</h4>
                                <h6>Image Box <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Grid</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/imagebox-grid.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Call To Action</h3>
								
                                <h4>Normal</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Normal</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-normal.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>With Background</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> With Background</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-with-background.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Default style</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Default style</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-default.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Success style</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Success style</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-success.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Info style</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Info style</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-info.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Warning style</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Warning style</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-warning.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Danger Style</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Danger Style</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-danger.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Left Side Button</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Left Side Button</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-left-button.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Button at Bottom</h4>
                                <h6>Call To Action <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Button at Bottom</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/cta-button-at-bottom.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Work Boxes</h3>
								
                                <h4>Default Style</h4>
                                <h6>Work Boxes <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Default Style</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/workbox-default-style.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Two Full Width Columns</h4>
                                <h6>Work Boxes <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Two Full Width Columns</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/workbox-two-full-width-columns.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Three Full Width Columns</h4>
                                <h6>Three Full Width Columns</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/workbox-three-full-width-columns.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Case Study</h4>
                                <h6>Work Boxes <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Case Study</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/workbox-case-study.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Services</h4>
                                <h6>Work Boxes <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Services</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/workbox-services.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Blog Blocks</h3>
								
                                <h4>Carousel Grid</h4>
                                <h6>Blog Blocks <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Carousel Grid</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/blog-carousel-grid.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Grid</h4>
                                <h6>Blog Blocks >Grid</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/blog-grid.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Default</h4>
                                <h6>Blog Blocks <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Default</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/blog-default.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Fluid Grid</h4>
                                <h6>Blog Blocks <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Fluid Grid</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/blog-fluid-grid.png" alt="SilverStripe Themes">
                            </div>
							
                            <div class="block">
                                <h3>Faq</h3>
                                <h4>Default</h4>
                                <h6>Faq <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Default</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/faq-default.png" alt="SilverStripe Themes">
                            </div>
                        </div>
						
                        <div class="tab-pane" id="tab-sg" role="tabpanel">
                            <div class="block">
                                <h3>Brand Colors</h3>
                                <h6><strong>Location:</strong> Scss <i class="fa fa-long-arrow-right" aria-hidden="true"></i> bootstrap <i class="fa fa-long-arrow-right" aria-hidden="true"></i> custom.scss  </h6>
                                <table class="table text-xs-center">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h4>Brand first</h4>
                                                <h6>\$brand-first</h6>
                                            </td>
                                            <td>
                                                <h4>Brand second</h4>
                                                <h6>\$brand-second</h6>
                                            </td>
                                            <td>
                                                <h4>Brand Third</h4>
                                                <h6>\$brand-third</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
							
                            <div class="block">
                                <h3>Assigning Colors to blocks or boxes</h3>
                                <p>
                                    Assign colors/background colors to boxes is simple. Below is a list of custom classes available to you.
                                </p>
                                <h6><strong>Location:</strong> Scss <i class="fa fa-long-arrow-right" aria-hidden="true"></i> bootstrap <i class="fa fa-long-arrow-right" aria-hidden="true"></i> custom.scss  </h6>
                                <table class="table">
                                    <tbody>
                                    <thead>
                                        <tr>
                                            <th>Color Classes</th>
                                            <th>Background Color Classes</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>
                                            .brand-first
                                        </td>
                                        <td>
                                            .bg-brand-first
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .brand-second
                                        </td>
                                        <td>
                                            .bg-brand-second
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .brand-third
                                        </td>
                                        <td>
                                            .bg-brand-third
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .brand-fourth
                                        </td>
                                        <td>
                                            .bg-brand-fourth
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .brand-fifth
                                        </td>
                                        <td>
                                            .bg-brand-fifth
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .color-bright
                                        </td>
                                        <td>
                                            Turns all block text white!
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .bg-none
                                        </td>
                                        <td>
                                            Removes default background colors
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>
                                    Simply add the class name to the HTML classes field as shown in the image below.
                                </p>
                                <img src="{$ThemeDir}/images/docs/html-class.png" class="w-100" />
                            </div>
							
                            <div class="block">
                                <h3>Padding Classes</h3>
                                <p>
                                    Bootstrap 4 provides re-usable padding and margin classes. Read more about the new bootstrap spacing <a href="https://v4-alpha.getbootstrap.com/utilities/spacing/">https://v4-alpha.getbootstrap.com/utilities/spacing/ </a>
                                </p>
                                <h6>To set the custom</h6>
                                <p>
                                    All classes are multiples on the global default value, 1rem.
                                </p>
                                <p>
                                    Below is a list of custom classes available to you.
                                </p>
                                <h6><strong>Location: </strong>scss <i class="fa fa-long-arrow-right" aria-hidden="true"></i> bootstrap <i class="fa fa-long-arrow-right" aria-hidden="true"></i> custom.scss  </h6>
                                <table class="table">
                                    <tbody>
                                    <thead>
                                        <tr>
                                            <th>Common Padding Classes</th>
                                            <th>Background Color Classes</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>
                                            .p-t-0
                                        </td>
                                        <td>
                                            no-top-padding
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-b-0
                                        </td>
                                        <td>
                                            no-bottom-padding
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-t-1
                                        </td>
                                        <td>
                                            top-padding 1rem
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-b-1
                                        </td>
                                        <td>
                                            bottom-padding 1rem
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-t-2
                                        </td>
                                        <td>
                                            top-padding 1rem * 2
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-b-2
                                        </td>
                                        <td>
                                            bottom-padding 1rem *2
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-t-3
                                        </td>
                                        <td>
                                            top-padding 1rem * 3
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-b-3
                                        </td>
                                        <td>
                                            bottom-padding 1rem *3
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-t-4
                                        </td>
                                        <td>
                                            top-padding 1rem * 4
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-b-4
                                        </td>
                                        <td>
                                            bottom-padding 1rem *4
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-t-5
                                        </td>
                                        <td>
                                            top-padding 1rem * 5
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            .p-b-5
                                        </td>
                                        <td>
                                            bottom-padding 1rem *5
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>
                                    Simply add the class name to the HTML classes field as shown in the image below.
                                </p>
                                <img src="{$ThemeDir}/images/docs/html-class.png" class="w-100" />
                            </div>
							
                            <div class="block">
                                <h3>Font Stacks & Colors</h3>
                                <h6>scss <i class="fa fa-long-arrow-right" aria-hidden="true"></i> bootstrap <i class="fa fa-long-arrow-right" aria-hidden="true"></i> custom.scss</h6>
<pre>
	<code>
// Body
\$body-color: #555;
\$font-family-sans-serif: 'Open Sans', sans-serif;
\$line-height-base: 1.6875;

// Headings
\$headings-color: #333;
\$headings-margin-bottom: (1rem / 2);
\$headings-font-family:   'Roboto', sans-serif;
\$headings-font-weight:   500 ;
	</code>
</pre>
                            </div>
							
                            <div class="block">
                                <h3>Buttons</h3>
                                <h6><strong>Location:</strong> scss <i class="fa fa-long-arrow-right" aria-hidden="true"></i> bootstrap <i class="fa fa-long-arrow-right" aria-hidden="true"></i> custom.scss</h6>
                                <table class="table text-xs-center">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="sc-button btn btn-rounded btn-primary">Primary</a>
                                                <h6>Brand First</h6>
                                                <p>
                                                    sc-button btn btn-rounded btn-primary
                                                </p>
                                            </td>
                                            <td>
                                                <a href="#" class="sc-button btn btn-rounded btn-outline-primary">Primary</a>
                                                <h6>Brand First Outline</h6>
                                                <p>
                                                    sc-button btn btn-rounded btn-outline-primary
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="sc-button btn btn-rounded btn-primary">WHITE BUTTON FILL</a>
                                                <h6> Color-Bright</h6>
                                                <p>
                                                    sc-button btn btn-rounded btn-outline-primary
                                                </p>
                                            </td>
                                            <td>
                                                <a href="#" class="sc-button btn btn-rounded btn-outline-primary">Primary</a>
                                                <h6>Color-Bright-Outline</h6>
                                                <p>
                                                    sc-button btn btn-rounded btn-outline-primary
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
						
                        <div class="tab-pane" id="tab-hf" role="tabpanel">
                            <div class="block">
                                <h3>Headers</h3>
								
                                <h4>Centered</h4>
                                <h6>Header <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Centered</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/header-centered.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Flat</h4>
                                <h6>Header <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Flat</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/header-flat.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Flat + Topbar</h4>
                                <h6>Header <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Flat + Topbar</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/header-flat-has-topbar.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Full Width</h4>
                                <h6>Header <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Full Width</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/header-full-width.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Radius Navigation</h4>
                                <h6>Header <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Radius Navigation</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/header-radius-navigation.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Semi Transparent</h4>
                                <h6>Header <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Semi Transparent</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/header-semi-transparent.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Transparent</h4>
                                <h6>Header <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Transparent</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/header-transparent.png" alt="SilverStripe Themes">
                            </div>
							
							<hr/>
							
                            <div class="block">
                                <h3>Footers</h3>
								
                                <h4>Centered</h4>
                                <h6>Footer <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Centered</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/footer-centered.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>Contains Widget</h4>
                                <h6>Footer <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Contains Widget</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/footer-contains-widget.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>With Menu</h4>
                                <h6>Footer <i class="fa fa-long-arrow-right" aria-hidden="true"></i> With Menu</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/footer-with-menu.png" alt="SilverStripe Themes">
                                <p>&nbsp;</p>
								
                                <h4>With Contacts</h4>
                                <h6>Footer <i class="fa fa-long-arrow-right" aria-hidden="true"></i> With Contacts</h6>
                                <img class="w-100" src="{$ThemeDir}/images/docs/footer-with-contacts.png" alt="SilverStripe Themes">
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
