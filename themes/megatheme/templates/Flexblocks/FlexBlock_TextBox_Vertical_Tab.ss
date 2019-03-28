<div class="block textbox-vertical-tabs<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
	<div class="container">
		<% if $Heading || $Content %>
		<div class="row">
			<div class="col-md-10 offset-md-1 section-header text-center">
				<% if $Heading %><h2 class="section-title">$Heading.XML</h2><% end_if %>
				<% if $Content %><div class="typography lead">$Content</div><% end_if %>
			</div>
		</div>
        <% end_if %>

        <% if $Boxes.count %>
        <div class="row tabs-left">
            <div class="col-md-4">
				<!-- Nav tabs -->
				<ul class="nav nav-pills nav-stacked" role="tablist">
					<% loop $Boxes.sort(SortOrder) %>
						<li class="nav-item">
							<a class="nav-link<% if $First %> active<% end_if %>" data-toggle="tab" href="#flexblock-textbox-{$ID}" data-target="#flexblock-textbox-{$ID}" role="tab">{$Title.XML}</a>
						</li>
					<% end_loop %>
				</ul>
            </div>

            <div class="col-md-8">
				<!-- Tab panes -->
				<div class="tab-content">
					<% loop $Boxes.sort(SortOrder) %>
					<div class="tab-pane <% if $First %>active<% end_if %>" id="flexblock-textbox-{$ID}" role="tabpanel">
						<% if $ImageID %>
						<div class="cover-image">
							<img src="{$Image.FocusFill(900,400).URL}" alt="{$Title.XML}" class="img-responsive w-100" />
						</div>
						<% end_if %>

						<div class="clearfix typography">$Content</div>
					</div>
				   	<% end_loop %>
				</div>
            </div>
        </div>
        <% end_if %>
	</div>
</div>
