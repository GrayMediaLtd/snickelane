<div class="block block-{$ClassName} {$HTMLClasses}" id="block-{$ID}">
	<div class="container">
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
			<div class="col-md-3 col-sm-6">
				<div class="iconbox iconbox-statistic">
					<% if $IconClass %><span class="iconbox-icon"><i class="fa {$IconClass}"></i></span><% end_if %>
					<div class="detail">
						<% if $Title %><span class="number">{$Title.XML}</span><% end_if %>
						<% if $Content %><span class="des">{$Content.XML}</span><% end_if %>
					</div>
				</div>
			</div>
			<% end_loop %>
			<% end_if %>
		</div>
	</div>
</div>
