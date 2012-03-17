<%@page import="com.elogra.model.Result"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<table>

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

for(int i = 0 ; i < r.getComments().size() ; i++){
	
out.print("<tr>");
out.print("<td>");
out.print("ElOgra");
out.print("</tdr>");

out.print("<td>");
out.print("From Adddr");
out.print("</tdr>");

out.print("<td>");
out.print(r.getComments().get(i).getSrcStreet());
out.print("</tdr>");

out.print("<td>");
out.print("To Addr");
out.print("</tdr>");

out.print("<td>");
out.print(r.getComments().get(i).getDestStreet());
out.print("</tdr>");

out.print("<td>");
out.print("Comment");
out.print("</tdr>");

out.print("<td>");
out.print(r.getComments().get(i).getComment());
out.print("</tdr>");

out.print("<td>");
out.print("Traffic");
out.print("</tdr>");

out.print("<td>");
out.print(r.getComments().get(i).getTraffic());
out.print("</tdr>");

out.print("</tr>");
}
%>
</table>
</body>
</html>