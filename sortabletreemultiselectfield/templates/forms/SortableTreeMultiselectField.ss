<% include TreeDropdownField %>

<div class="clearfix SortableTreeMultiselectField" data-tree-id="{$ID}">
    
    <h3 class="stmsf-heading">Drag an item to sort:</h3>
    
    <ul class="stmsf-sortlist">
        <% if $Items %>
        <% loop $Items %>
        <li class="clearfix" data-item-id="{$ID}">
            <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
            
            <% if $Parent %>
                <% include SortableTreeMultiselectField_Title %>
            <% else %>
                $Title
            <% end_if %>
        </li>
        <% end_loop %>
        <% end_if %>
    </ul>
</div>