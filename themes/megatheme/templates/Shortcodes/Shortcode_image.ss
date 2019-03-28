<div class="sc-image {$align}">
	<a href="{$original_url}" class="btn-open-lightbox" title="<% if $caption %>$caption<% else %>$alt<% end_if %>">
	    <img src="{$url}" alt="{$alt}" class="img-fluid" />
	</a>
	
	<% if $caption %>
        <p class="caption">
            $caption
        </p>
    <% end_if %>
</div>