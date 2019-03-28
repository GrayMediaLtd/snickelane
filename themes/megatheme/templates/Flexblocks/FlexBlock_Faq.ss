<div class="block ct-faq<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="ct-faq-header text-xs-center">
                    <% if $Heading %><h2 class="ct-faq-title">$Heading.XML</h2><% end_if %>
                </div>
                <div id="accordion-{$ID}" role="tablist" aria-multiselectable="true">
                    <% loop $Faqs.sort(SortOrder) %>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading-{$Top.ID}-{$Pos}">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion-{$Top.ID}" href="#" data-target="#collapse-{$Top.ID}-{$Pos}" aria-controls="collapse-{$Top.ID}-{$Pos}">
                                    $Question
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-{$Top.ID}-{$Pos}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-{$Top.ID}-{$Pos}">
                            <p>$Answer.NoHTML</p>
                        </div>
                    </div>
                    <% end_loop %>
                </div>
            </div>
        </div>
    </div>
</div>
