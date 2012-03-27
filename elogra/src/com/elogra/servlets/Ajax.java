package com.elogra.servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.elogra.db.DBConnection;
import com.elogra.db.DBConstants;
import com.elogra.model.Areas;
import com.google.gson.Gson;

/**
 * Servlet implementation class Ajax
 */
@WebServlet("/Ajax")
public class Ajax extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Ajax() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html");
		response.setCharacterEncoding("utf-8");
		Class<? extends Ajax> class1 = this.getClass();
		Class[] parameterTypes = {HttpServletRequest.class};
		Object returned = null;
		try {
			Method method = class1.getDeclaredMethod(request.getParameter("action"), parameterTypes);
			returned = method.invoke(this, new Object[]{request});
		} catch (SecurityException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (NoSuchMethodException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IllegalArgumentException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IllegalAccessException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (InvocationTargetException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		PrintWriter writer = response.getWriter();
		Gson gson = new Gson();
		writer.println(gson.toJson(returned));
		writer.close();
		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
	}
	
	private List<Areas> getTopLevelAreas(HttpServletRequest request){
		DBConnection dbc = new DBConnection();
		List<Areas> areas = new ArrayList<Areas>();
		//String sql = "SELECT * FROM areas where parent_id is null";
		String sql = "SELECT * FROM " + DBConstants.AREAS + " where " + DBConstants.AREAS_PARENT_ID + " is null and " + DBConstants.AREAS_APPROVED + " = 1";
		DBConnection.QueryResult qr = dbc.executeQuery(sql);
				
		for (int i = 0 ; i < qr.getRowsCount() ; i++) {
			Areas area = new Areas();
			area.setName(qr.getObject(i, DBConstants.AREAS_NAME).toString());
			area.setId(Integer.parseInt(qr.getObject(i, DBConstants.AREAS_ID).toString()));
			areas.add(area);
		}
		
		dbc.closeConnection();
		/*Statement statement = null;
		ResultSet resultSet = null;
		try {
			statement = connection.createStatement();
			resultSet = statement.executeQuery(sql);
			while(resultSet.next()){
				Areas area = new Areas();
				area.setName(resultSet.getString("name"));
				area.setId(resultSet.getInt("id"));
				areas.add(area);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			try {
				resultSet.close();
				statement.close();
				connection.close();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
		}*/
		
		
		return areas;
		
	}
	
	private List<Areas> getAreasUnder(HttpServletRequest request){
		int parentId = Integer.parseInt(request.getParameter("id"));
		DBConnection dbc = new DBConnection();
		List<Areas> areas = new ArrayList<Areas>();
		String sql = "SELECT * FROM " + DBConstants.AREAS + " where " + DBConstants.AREAS_PARENT_ID + " = ? and " + DBConstants.AREAS_APPROVED + " = 1";
		ArrayList<Object> params = new ArrayList<Object>();
		params.add(parentId);
		DBConnection.QueryResult qr = dbc.executeQuery(sql, params);
		
		for (int i = 0 ; i < qr.getRowsCount() ; i++) {
			Areas area = new Areas();
			area.setName(qr.getObject(i, DBConstants.AREAS_NAME).toString());
			area.setId(Integer.parseInt(qr.getObject(i, DBConstants.AREAS_ID).toString()));
			areas.add(area);
		}
		
		dbc.closeConnection();
		
		/*PreparedStatement statement = null;
		ResultSet resultSet = null;
		try {
			statement = connection.prepareStatement(sql);
			statement.setInt(1, parentId);
			resultSet = statement.executeQuery();
			while(resultSet.next()){
				Areas area = new Areas();
				area.setName(resultSet.getString("name"));
				area.setId(resultSet.getInt("id"));
				areas.add(area);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			try {
				resultSet.close();
				statement.close();
				connection.close();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
		}*/
		
		
		return areas;	
	}

}
