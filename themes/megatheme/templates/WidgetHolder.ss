<% if $Content %>
<div class="widget wh-$ClassName clearfix <% if WidgetClassSuffix %>$WidgetClassSuffix<% end_if %>">
	<% if WidgetTitle %>
		<h3 class="widget-title">$WidgetTitle</h3>
	<% end_if %>
	<div class="widget-content clearfix">
        <div>$Content</div>
    </div>
</div>
<% end_if %>