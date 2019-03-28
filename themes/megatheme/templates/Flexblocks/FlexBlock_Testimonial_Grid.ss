<div class="block testimonials block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
	<div class="container">
		<% if $Heading || $Content %>
		<div class="section-header">
			<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
			<% if $Content %><div class="typography lead">$Content</div><% end_if %>
		</div>
		<% end_if %>

		<% if $Testimonials.count %>
		<div class="row">
		<% loop $Testimonials.sort(SortOrder) %>
			<div class="col-md-6" data-mh="flexblock-testimonial-grid">
				<div class="testimonial testimonial-grid">
					<% if $PhotoID %>
					<div class="thumbnail">
						<img src="{$Photo.FocusFill(100,100).URL}" alt="{$Name.XML}" />
					</div>
					<% end_if %>

					<div class="testimonial-detail">
						$Name.XML

						<% if $Company || $JobTitle %>
							<h4>
								<small><% if $JobTitle %>{$JobTitle},<% end_if %> $Company.XML</small>
							</h4>
						<% end_if %>

						<% if $Message %><p>$Message.XML</p><% end_if %>
					</div>
				</div>
			</div>
		<% end_loop %>
		</div>
		<% end_if %>
	</div>
</div>
