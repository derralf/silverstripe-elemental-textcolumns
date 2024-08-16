
                <div class="{$ColCss} textcolumns-item grid-list-item">

                    <h3 class="textcolumns-item-title">$Title</h3>
                    <div class="textcolumns-item-content">
                        $Content
                    </div>

                    <%-- silverstripe/linkfield --%>
                    <% if $ReadMoreLink.URL %>
                        <div class="element__readmorelink"><p><a href="$ReadMoreLink.URL" class="{$ReadmoreLinkClass}" <% if $ReadMoreLink.OpenInNew %>target="_blank" rel="noopener noreferrer"<% end_if %> ><% if $ReadMoreLink.Title %>$ReadMoreLink.Title<% else %> mehr<% end_if %></a></p></div>
                    <% end_if %>

                </div>

