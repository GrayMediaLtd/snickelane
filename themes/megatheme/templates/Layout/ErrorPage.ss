<% if $EnableHeader %>
<div class="page-header" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %>>
	<div class="container">
		<div class="row">
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

<div id="wrapper" class="wrapper">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<section class="block block-v11 block-404 background-v1">
					<div class="container">
						<div class="row">
							<div class="col-md-5">
								<div class="well-wrapper">
									<div class="well first well-v5 text-center error-code" data-mh="error-page-content">
										<div class="error-404">$ErrorCode</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-7">
								<div class="well-wrapper">
									<div class="p-a-2" data-mh="error-page-content">
										<div class="clearfix primary-content typography no-margin-top-for-headings">$Content</div>
										
										<div class="search-form">$SearchForm</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</main>
			<!-- #main -->
		</div>
		<!-- #primary -->
	</div>
	<!-- #content -->
</div>