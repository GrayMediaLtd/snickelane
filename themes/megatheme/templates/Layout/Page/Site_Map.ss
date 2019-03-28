<% if $EnableHeader %>
<div class="page-header" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
    <div class="container">
        <div class="row page-intro">
            <div class="col-md-6">
                <h1 class="page-heading">$FinalPageHeading.XML</h1>
				
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

<div class="container">
	<div class="sitemap">
		<h3 class="sitemap-heading">
			<a href="{$BaseHref}" title="Go to the Home page">
				Home
			</a>
		</h3>
		
		<% if $Menu(1) %>
			<% loop $Menu(1) %>
				<h3 class="sitemap-heading">
					<a href="{$Link}" title="Go to the {$Title.XML} page">
						$MenuTitle
					</a>
				</h3>
				
				<% if $AllChildren %>
				<ul class="list-unstyled">
					<% include SitemapItems %>
				</ul>
				<% end_if %>
			<% end_loop %>
		<% end_if %>
	</div>
</div>