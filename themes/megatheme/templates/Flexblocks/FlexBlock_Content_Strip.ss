<!-- .ct-strip  /scss/_content-strip.scss -->

<% if $Content %>
<div class="block ct-strip<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <p class="lead">
                    $Content
                </p>
            </div>
        </div>
    </div>
</div>
<% end_if %>
