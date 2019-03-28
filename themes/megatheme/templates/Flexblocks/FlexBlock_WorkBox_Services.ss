<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <% if $Boxes.count %>
            <% loop $Boxes.sort(SortOrder) %>
            <div class="col-md-4">
                <div class="servicebox">
					<div class="servicebox-thumbnail">
						<img src="$Image.URL" alt="Consulting" class="img-responsive">
					</div>
					
					<div class="servicebox-detail">
						<div class="servicebox-top">
							<i class="fa fa-3x fa-microphone"></i>
							<h3>$Title.XML</h3>
						</div>
						
						<% if $Link %>
						<div class="servicebox-bottom">
							<a href="{$Link}" title="Consulting" class="btn btn-rounded btn-brand-third btn-md ">
								Learn more
							</a>
						</div>
						<% end_if %>
					</div>
				</div>
            </div>
            <% end_loop %>
			<% end_if %>
        </div>
    </div>
</div>
