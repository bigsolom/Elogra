<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@page import="com.elogra.db.DBConstants"%>
<%@page import="com.elogra.db.DBConnection"%>
<%
String parent = request.getParameter("parent");
DBConnection dbc = new DBConnection();

String sql = "";
if(parent.equals("null")){
	sql = "SELECT * FROM " + DBConstants.AREAS + " where " + DBConstants.AREAS_PARENT_ID + " is null";
}else{
	sql = "SELECT * FROM " + DBConstants.AREAS + " where " + DBConstants.AREAS_PARENT_ID + " = " + parent;
}
	
	DBConnection.QueryResult qr = dbc.executeQuery(sql);

	response.reset();
	//String message = new String( rs.getBytes("message"), "UTF-8");
	
	for(int i = 0 ; i < qr.getRowsCount() ; i++){
	String value = 	new String (qr.getObject(i, DBConstants.AREAS_NAME).toString().getBytes());
	%>
		<option label="<%=value %>" value="<%= qr.getObject(i, DBConstants.AREAS_ID) %>" />
<% 	}
dbc.closeConnection();
%>