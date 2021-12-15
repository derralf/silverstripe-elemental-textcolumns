
                <div class="textcolumns-item">

                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="textcolumns-item-title">$Title</h3>
                        </div>
                        <div class="col-md-8">
                            <div class="textcolumns-item-content">
                                $Content
                            </div>
                            <% if $ReadMoreLink.LinkURL %>
                            <div class="element__readmorelink"><p><a href="$ReadMoreLink.LinkURL" class="{$ReadmoreLinkClass}" {$ReadMoreLink.TargetAttr} ><% if $ReadMoreLink.Title %>$ReadMoreLink.Title<% else %> mehr<% end_if %></a></p></div>
                            <% end_if %>
                        </div>
                    </div>

                </div>

