<%@page import="com.elogra.model.Comments"%>
<%@page import="com.elogra.model.Result"%>
<%@ page contentType="text/html; charset=UTF-8" language="java" import="java.sql.*" errorPage="" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<form id="form1" name="form1" method="post" action="">
 <p>Live Fare 
   <label for="textfield"></label>
   <input type="text" name="textfield" id="textfield" />
 </p>
<p>History Fare
  <input type="text" name="textfield2" id="textfield2" />
</p>
  <p>User
    <input type="text" name="textfield3" id="textfield3" />
  </p>
  <p>Address from
    <input type="text" name="textfield4" id="textfield4" />
  </p>
  <p>Address to
    <input type="text" name="textfield5" id="textfield5" />
  </p>
  <p>Comments
    <input type="text" name="textfield6" id="textfield6" />
  </p>
   <p>Trafic rating 
     <input type="text" name="textfield7" id="textfield7" />
     <br />
   </p>
 </form>
<p>&nbsp;</p>

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

	<div class="span6">
			<%=comment.getComment()%>
		<div class="row show-grid">
				<div class="span3"><%=comment.getSrcStreet()%></div>
				<div class="span3"><%=comment.getDestStreet()%></div>
		</div>
	</div>
</div>


<%
	}
%>