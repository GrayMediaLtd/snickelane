<div class="retailer-header">
	<% if $Logo %>
	<div class="hidden-md-up">
		$Logo.SetSize(250,110)
	</div>
	<% end_if %>

	<div class="rh-left pull-left">
		<h1 class="rh-heading">
		<% if $PageHeading %>
			<% loop $PageHeading.str2List(br) %>
				<span>{$Text}</span>
			<% end_loop %>
		<% else %>
			<span>$Title.XML</span>
		<% end_if %>
		</h1>

		<div class="rh-type"><% if $Cuisine %>{$Cuisine}, <% end_if %>{$Type}</div>
	</div>

	<% if $Logo %>
	<div class="rh-right pull-right sm-logo">
		<%--$Logo.FocusFill(250,110)--%>
		$Logo.Fit(115,115)
	</div>
	<% end_if %>
</div>

<% if $Images.count %>
<div class="retailer-banner">
	<div class="retailer-contact">
		<div>
			<% if $Phone %><div class="rc-phone">{$Phone}</div><% end_if %>
			<% if $Website %><div class="rc-web"><a href="//{$Website}" target="_blank" rel="nofollow">{$Website}</a></div><% end_if %>

			<% if $Facebook || $Instagram || $Twitter %>
			<div class="rc-social">
				<% if $Facebook %><a href="{$Facebook}" target="_blank" rel="nofollow"><i class="fa fa-facebook-square"></i></a><% end_if %>
				<% if $Instagram %><a href="{$Instagram}" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i></a><% end_if %>
				<% if $Twitter %><a href="{$Twitter}" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a><% end_if %>
			</div>
			<% end_if %>
		</div>
	</div>

	<div class="carousel retailer-carousel banner-carousel tscarousel slide class-only" data-ride="carousel" data-interval="6000">
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<% loop $Images.sort('SortOrder') %>
			<div class="carousel-item <% if $First %>active<% end_if %>" style="background-image: url('$FocusCropHeight(240).URL');">
				<img src="{$FocusCropHeight(389).URL}" alt="{$Title.XML}" class="img-responsive center-block" />
			</div>
			<% end_loop %>
		</div>

		<div class="carousel-controls-middle">
			<div>
				<a class="ccm-nav ccm-left" role="button" data-control="carousel" data-slide="prev" href="#">
					<span class="sr-only">Previous</span>
				</a>

				<a class="ccm-nav ccm-right" role="button" data-control="carousel" data-slide="next" href="#">
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>
<% end_if %>

<% if $PageIntroduction %>
<div class="retailer-intro"><% loop $PageIntroduction.str2List(br) %><span>{$Text}</span><% end_loop %></div>
<% end_if %>

<% if $Content %>
<div class="retailer-content-wrapper">
	<div class="retailer-content">
		<div class="typography">$Content</div>

		<% if $RetailerMenu %>
		<div class="retailer-menu-download">
			<a class="btn-menu-download" target="_blank" href="{$RetailerMenu.getAbsoluteURL}">MENU</a>
		</div>
		<% end_if %>

		<div class="retailer-share">
			<div class="addthis_inline_share_toolbox"></div>
		</div>

		<div class="retailer-logo hidden-md-down"><img src="{$ThemeDir}/images/stamp-gray.png" class="img-fluild" /></div>
	</div>
</div>
<% end_if %>

<% if $FlexBlocks %>
<div id="wrapper" class="wrapper">
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
			<% loop $FlexBlocks.sort(SortOrder) %>
				$forTemplate
			<% end_loop %>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- #content -->
</div>
<% end_if %>
