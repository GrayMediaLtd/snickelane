<% if $StaffMembers %>
<div class="block <% if $HTMLClasses %>{$HTMLClasses} <% end_if %>block-{$ClassName}" id="block-{$ID}">
    <div class="container-fluid">
		<div class="row">
			<% loop $StaffMembers.sort('RelSort') %>
			<div class="col-md-3 tm-member tm-social">
				<div class="tm-member-inner">
					<img class="member-pic" src="<% if $PhotoID %>{$Photo.FocusFill(759,766).URL}<% else %>{$ThemeDir}/images/placeholder-avatar.jpg<% end_if %>" alt="avatar" />
					<div class="detail">
						<h5 class="member-ccupation">$Name.XML</h5>
						<% if $JobTitle %><h4 class="member-name">$JobTitle.XML</h4><% end_if %>
					</div>
	
					<% if $Networks %>
						<ul class="social">
							<% loop $Networks %>
								<li class="social-{$Code}"><a href="{$URL}" target="_blank" rel="nofollow"><i class="fa fa-{$Code}"></i></a></li>
							<% end_loop %>
						</ul>
					<% end_if %>
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
<% end_if %>
