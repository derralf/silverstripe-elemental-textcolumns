
                <div class="textcolumns-item">

                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="textcolumns-item-title">$Title</h3>
                        </div>
                        <div class="col-md-8">
                            <div class="textcolumns-item-content">
                                $Content
                            </div>
                            <%-- silverstripe/linkfield --%>
                            <% if $ReadMoreLink.URL %>
                                <div class="element__readmorelink"><p><a href="$ReadMoreLink.URL" class="{$ReadmoreLinkClass}" <% if $ReadMoreLink.OpenInNew %>target="_blank" rel="noopener noreferrer"<% end_if %> ><% if $ReadMoreLink.Title %>$ReadMoreLink.Title<% else %> mehr<% end_if %></a></p></div>
                            <% end_if %>
                        </div>
                    </div>

                </div>

