<%@page import="com.elogra.model.Comments"%>
<%@page import="com.elogra.model.Result"%>
<%@ page contentType="text/html; charset=UTF-8" language="java" import="java.sql.*" errorPage="" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<table border="1">

<%
	Result r = (Result) request.getAttribute("searchResult");

	out.print("<tr>");
	out.print("<td>");
	out.print("Live Fare");
	out.print("</tdr>");
	out.print("<td>");
	out.print(r.getLiveFare());
	out.print("</tdr>");
	out.print("<td>");
	out.print("History Fare");
	out.print("</tdr>");
	out.print("<td>");
	out.print(r.getHistoryFare());
	out.print("</tdr>");
	out.print("</tr>");
%>
</table>
<%
	for (Comments comment : r.getComments()) {
%>
<div class="row show-grid">

	<div class="span8 traffic-status-<%=comment.getTraffic()%>">
			<%=comment.getComment()%>
		<div class="row show-grid">
				<div class="span4"><%=comment.getSrcStreet()%></div>
				<div class="span4"><%=comment.getDestStreet()%></div>
		</div>
	</div>
</div>


<%
	}
%>