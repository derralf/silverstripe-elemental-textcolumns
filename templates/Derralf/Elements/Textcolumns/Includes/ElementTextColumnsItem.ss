
                <div class="{$ColCss} textcolumns-item grid-list-item">

                    <h3 class="textcolumns-item-title">$Title</h3>
                    <div class="textcolumns-item-content">
                        $Content
                    </div>

                    <% if $ReadMoreLink.LinkURL %>
                        <div class="element__readmorelink"><p><a href="$ReadMoreLink.LinkURL" class="{$ReadmoreLinkClass}" {$ReadMoreLink.TargetAttr} ><% if $ReadMoreLink.Title %>$ReadMoreLink.Title<% else %> mehr<% end_if %></a></p></div>
                    <% end_if %>

                </div>

