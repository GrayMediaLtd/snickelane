<div style="display: none;">
	<div
		id="user-form-popup-{$ID}"
		class="user-form-popup <% if $HTMLClasses %>{$HTMLClasses}<% end_if %> block-{$ClassName}"
		data-at-bottom="1"
	>
		<button data-remodal-action="close" class="remodal-close"></button>
		
		<% if $Heading || $Content %>
		<div class="ufp-header">
			<% if $Heading %><h3 class="section-title">$Heading.XML</h3><% end_if %>
			<% if $Content %><div class="typography">$Content</div><% end_if %>
		</div>
		<% end_if %>
		
		<div class="ufp-content block-form label-as-placeholder">
			$Form
		</div>
	</div>
</div>