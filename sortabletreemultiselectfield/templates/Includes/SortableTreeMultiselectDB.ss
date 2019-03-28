<ul class="sortable-tree-pages">
    <% loop $Items %>
    <li>
        <a href="{$Link}" title="{$Title.XML}">
            $MenuTitle
        </a>
    </li>
    <% end_loop %>
</ul>