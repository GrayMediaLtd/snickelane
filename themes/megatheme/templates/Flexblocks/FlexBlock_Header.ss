<div class="page-header text-white" <% if $PageImageID %>style="background-image: url('{$PageImage.URL}');"<% end_if %> id="block-{$ID}">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <% if $Heading %>
                <h1>$Heading.XML</h1>
                <% else %>
                <h1>$Title</h1>
                <% end_if %>
            </div>
            <div class="col-md-6">
                <% include MainBreadcrumb %>
            </div>
        </div>
    </div>
</div>
