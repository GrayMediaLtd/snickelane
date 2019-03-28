<% if $Boxes.count %>
<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<% if $Heading || $Content %>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="section-header text-center">
					<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
					<% if $Content %><div class="typography">$Content</div><% end_if %>
				</div>
			</div>
		</div>
		<% end_if %>

		<div class="textbox-horizontal-rounded">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<% loop $Boxes.sort(SortOrder) %>
				<li class="nav-item">
					<a class="nav-link<% if $First %> active<% end_if %>" data-toggle="tab" data-target="#flexblock-textbox-h-{$ID}" href="#flexblock-textbox-h-{$ID}" role="tab">{$Title.XML}</a>
				</li>
            <% end_loop %>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<% loop $Boxes.sort(SortOrder) %>
				<div role="tabpanel" class="tab-pane <% if $First %>active<% end_if %>" id="flexblock-textbox-h-{$ID}">
					<% if $ImageID %>
					<div class="cover-image">
						<img src="{$Image.FocusFill(900,400).URL}" alt="{$Title.XML}" class="img-responsive" />
					</div>
					<% end_if %>

					<div class="clearfix typography">$Content</div>
				</div>
				<% end_loop %>
			</div>
			<!-- end of .tab-content -->
		</div>
	    <!-- end of .tab-features -->
	</div>
</div>
<% end_if %>
