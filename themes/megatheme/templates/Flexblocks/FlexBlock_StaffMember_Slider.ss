<% if $StaffMembers %>
<div class="block<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="staff-carousel">
            <% loop $StaffMembers.sort('RelSort') %>
            <div class="tm-member tm-slider">
                <div class="tm-member-inner">
                    <img class="member-pic" src="<% if $PhotoID %>{$Photo.FocusFill(759,766).URL}<% else %>{$ThemeDir}/images/placeholder-avatar.jpg<% end_if %>" alt="avatar" />
                    <div class="detail bg-brand-third">
                        <h5 class="member-ccupation">$Name.XML</h5>
                        <% if $JobTitle %><h4 class="member-name">$JobTitle.XML</h4><% end_if %>
                    </div>
                </div>
            </div>
            <% end_loop %>
        </div>
    </div>
</div>
<% end_if %>
