<div class="block img-blk<% if $HTMLClasses %> {$HTMLClasses}<% end_if %> block-{$ClassName}" style="background-image:url($Image.URL);" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="title">$Heading.XML</h2>
                $Content
            </div>
        </div>
    </div>
</div>
