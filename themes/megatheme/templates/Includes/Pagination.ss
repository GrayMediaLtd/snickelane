<%-- NOTE: Before including this, you will need to wrap the include in a with block  --%>

<% if $MoreThanOnePage %>
<div class="pagination-wrapper text-center">
	<ul class="pagination pagination-sm">
		<% if $NotFirstPage %>
			<li>
				<a href="$PrevLink" title="View the previous page">
					&lt;
				</a>
			</li>
		<% else %>	
			<li class="disabled">
				<span>
					&lt;
				</span>
			</li>
		<% end_if %>
	
    	<% loop $PaginationSummary(3) %>
			<% if CurrentBool %>
				<li class="active"><span>$PageNum</span></li>
			<% else %>
				<% if Link %>
					<li>
						<a class="<% if BeforeCurrent %>paginate-left<% else %>paginate-right<% end_if %>" href="$Link">
							$PageNum
						</a>
					</li>
				<% else %>
					<li class="disabled"><span>&hellip;</span></li>						
				<% end_if %>
			<% end_if %>
		<% end_loop %>
	
		<% if $NotLastPage %>
			<li>
				<a class="next paginate-right" href="$NextLink" title="View the next page">
					&gt;
				</a>
			</li>
		<% else %>
			<li class="disabled">
				<span>
					&gt;
				</span>
			</li>
		<% end_if %>
	</ul>
</div>
<% end_if %>