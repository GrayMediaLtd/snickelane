<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container-fluid">
		<div class="row">
			<% if $Heading || $Content %>
			<div class="col-md-10 offset-md-1 section-header text-center">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>

			<div class="clearfix"></div>
			<% end_if %>

			<% if $Boxes.count %>
		    <% loop $Boxes.sort(SortOrder) %>
				<div class="col-md-6">
					<div class="block-content <% if $MultipleOf(2) %>back-gray-light<% else %>back-gray-lighter<% end_if %>">
						<% if $Title.XML %><h4 class="has-bottom-line" data-mh="flexblock-textbox-2cols-heading">$Title.XML</h4><% end_if %>
						<% if $Content %><div class="typography clearfix" data-mh="flexblock-textbox-2cols-content">$Content</div><% end_if %>
					</div>
				</div>
			<% end_loop %>
			<% end_if %>
		</div>
	</div>
</div>
