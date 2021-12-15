
<% if $ShowTitle %>
    <% include Derralf\\Elements\\Textcolumns\\Title %>
<% end_if %>

<% if $HTML %>
    <div class="element__content">$HTML</div>
<% end_if %>

<% if $TextColumnsItems %>
    <div class="textcolumns-list-wrapper">
        <div class="textcolumns-list">
            <div class="row">
                <% loop $TextColumnsItems %>

                    <% include Derralf\\Elements\\Textcolumns\\Includes\\ElementTextColumnsItem ColCss=col-sm-4 %>

                <% end_loop %>
            </div>
        </div>
    </div>
<% end_if %>
