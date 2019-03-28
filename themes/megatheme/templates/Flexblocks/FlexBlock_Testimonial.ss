<div class="block testimonials block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
	<div class="container">
		<div class="row">
			<% if $Heading || $Content %>
			<div class="section-header text-center col-md-8 offset-md-2">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>
			<% end_if %>

			<div class="clearfix"></div>

			<% if $Testimonials.count %>
			<% loop $Testimonials.sort(SortOrder) %>
				<div class="col-md-4">
					<div class="testimonial testimonial-default">
						<% if $PhotoID %>
						<img class="img-circle" src="{$Photo.FocusFill(100,100).URL}" width="100" alt="{$Name}" />
						<% end_if %>

						<blockquote>
							<header>
								$Name
								<% if $Company || $JobTitle %>
								    <cite title="{$Company.XML}"><% if $JobTitle %>{$JobTitle}, <% end_if %>$Company.XML</cite>
								<% end_if %>
							</header>

							<p>$Message</p>
						</blockquote>
					</div>
				</div>
				<% end_loop %>
			<% end_if %>
		</div>
	</div>
</div>
