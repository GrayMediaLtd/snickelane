<% if $Content %>
<div class="block<% if $HTMLClasses %> {$HTMLClasses} <% else %> p-t-1 p-b-1<% end_if %>" id="block-{$ID}">
    <div class="container">
        <div class="row">
            <div class="col-md-4">   
                <% if $ImageID %>
            <div class="client">
                <img class="img-fluid" src="{$Image.URL}" alt="image" />
            </div>
                <% end_if %>
            </div>
            <div class="col-md-8">   
                <div class="">
             <p>
                $Content
             </p>
                </div>
            </div>
        </div>  
    </div>  
 </div>
<% end_if %>
