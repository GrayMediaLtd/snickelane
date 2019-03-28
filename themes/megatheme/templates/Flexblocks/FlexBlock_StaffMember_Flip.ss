<% if $StaffMembers %>
<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="row no-gutter">
        <% loop $StaffMembers.sort('RelSort') %>
            <div class="col-md-3 tm-member tm-flip flip-container">
                <div class="flipper">
                    <div class="front" style='background-image: url("<% if $PhotoID %>{$Photo.FocusFill(759,766).URL}<% else %>{$ThemeDir}/images/placeholder-avatar.jpg<% end_if %>");'>
                        <div class="detail">
                            <h5 class="member-ccupation">$Name.XML</h5>
                            <% if $JobTitle %><h4 class="member-name">$JobTitle.XML</h4><% end_if %>
                        </div>
                    </div>
				
                    <div class="back bg-primary">
                        <% if $Biography %>
                            <div class="detail">
                                $Biography.LimitCharactersToClosestWord(120)
                            </div>
                        <% end_if %>
						
                        <% if $Networks %>
                            <ul class="social">
                                <% loop $Networks %>
                                    <li class="social-{$Code}"><a href="{$URL}" target="_blank" rel="nofollow"><i class="fa fa-{$Code}"></i></a></li>
                                <% end_loop %>
                            </ul>
                        <% end_if %>
                    </div>
                </div>
            </div>
        <% end_loop %>
    </div>
</div>
<% end_if %>
