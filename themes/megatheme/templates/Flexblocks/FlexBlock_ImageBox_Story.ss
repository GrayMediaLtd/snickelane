<% if $Boxes.count %>
<div class="block-story <% if $HTMLClasses %>{$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="row no-gutter">
		<% loop $Boxes.sort(SortOrder) %>
			<% if $Image %>
			<div
				class="col-xs-12 col-sm-12 col-md-6 col-lg-6 block-story-box {$FirstLast} <% if $Title.containString('content-container') %>content-container<% else %>hidden-sm-down<% end_if %>"
				style="background-image: url('{$Image.FocusFill(900,600).URL}');"
			>
				<!--
				<% if not $Title.containString('content-container') %>
				<div class="bsb-image">
					<img src="{$Image.URL}" alt="..." class="img-fluid" />
				</div>
				<% end_if %>
				-->
				
				<% if $Title.containString('content-container') %>
				<div class="block-story-content">
					<% if $Top.Heading %><h3 class="bsc-heading">$Top.Heading</h3><% end_if %>
					<% if $Top.Content %><div class="bsc-content">$Top.Content</div><% end_if %>
				</div>
				<% end_if %>
			</div>
			<% end_if %>
		<% end_loop %>
	</div>
</div>
<% end_if %>
