<ul class="<% if $HTMLClasses %>{$HTMLClasses}<% else %>nav navbar-nav pull-lg-right<% end_if %>">
	<% loop $Menu(1) %>
	<% if $Children.count %>
	<li class="nav-item <% if $LinkingMode = 'section' || $LinkingMode = 'current' %>active<% else %>$LinkingMode<% end_if %> dropdown <% if $MenuColumns.count %>yamm-fw<% end_if %>">
		<a href="{$Link}" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
			$MenuTitle.XML
			<span class="caret"></span>
		</a>

		<ul class="dropdown-menu dropdown-menu-left" role="menu">
		<% if $MenuColumns.count %>
			<li>
				<div class="mega-menu-content">
					<div class="row">
						<% loop $MenuColumns.sort(SortOrder) %>
						<div
							<% if $Up.Count = 1 %>
							class="col-md-12"
							<% else_if $Up.Count = 2 %>
							class="col-md-6 col-sm-6"
							<% else_if $Up.Count = 3 %>
							class="col-md-4 col-sm-6"
							<% else_if $Up.Count = 4 %>
							class="col-md-3 col-sm-6"
							<% else %>
							class="col-md-2 col-sm-6"
							<% end_if %>
						>
							<h5>{$Title.XML}</h5>

							<ul class="list-unstyled">
							<% loop $MenuItems %>
								<li><a href="{$Link}">$MenuTitle.XML</a></li>
							<% end_loop %>
							</ul>
						</div>
						<% end_loop %>
					</div>
				</div>
			</li>
		<% else %>
			<% loop $Children %>
			<li class="dropdown-item"><a href="{$Link}">$MenuTitle.XML</a></li>
			<% end_loop %>
		<% end_if %>
		</ul>
	</li>
	<% else %>
	<li class="nav-item <% if $LinkingMode = 'section' || $LinkingMode = 'current' %>active<% else %>$LinkingMode<% end_if %>">
		<a class="nav-link" href="{$Link}">
			$MenuTitle.XML
		</a>
	</li>
	<% end_if %>
	<% end_loop %>
</ul>
