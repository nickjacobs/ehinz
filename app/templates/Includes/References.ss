<%--<% if $References %>--%>
<%--    <div class="references-section">--%>
<%--        <h2 class="anchor" id="references">References</h2>--%>
<%--        <div class="references-section--content">--%>
<%--            $References--%>
<%--        </div>--%>
<%--    </div>--%>
<%--<% end_if %>--%>

<% if $References %>
    <div class="references expand-box links" >
        <h3 class="toggle-clicker anchor" id="references">References <img class="toggle-btn" src="images/icon-toggle-grey.png" /></h3>
        <div class="row-toggle">
            $References
        </div>
    </div>
<% end_if %>
