<% if $Boxes.count %>
<div class="<% if $HTMLClasses %>{$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <% if $Heading || $Content %>
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 section-header text-center">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>
		</div>
	</div>
	<% end_if %>

	<% loop $Boxes.sort(SortOrder) %>
	<div class="iconbox iconbox-big-row">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
                    <div class="iconbox-icon">
                        <% if $IconClass %>
                        <i class="fa {$IconClass}"></i>
                        <% end_if %>
                    </div>
                    <div class="detail">
                        <% if $Title %>
                            <h2>$Title</h2>
                        <% end_if %>
                        <% if $Content %>
                            <p>$Content</p>
                        <% end_if %>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<% end_loop %>
</div>
<% end_if %>
