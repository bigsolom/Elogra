package com.elogra.db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class DBConnection {
	public Connection getConnection(String username, String pass){
		Connection conn = null;

        try
        {
            String url = "jdbc:mysql://localhost/elogra";
            Class.forName ("com.mysql.jdbc.Driver").newInstance ();
            conn = DriverManager.getConnection (url, username, pass);
            System.out.println ("Database connection established");
            return conn;
        }
        catch (Exception e)
        {
            System.err.println ("Cannot connect to database server");
            e.printStackTrace();
            return null;
        }

	}
	
	public boolean executeUpdate(Connection conn, String sql){
		try {
			Statement stmt = conn.createStatement();
			return stmt.execute(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}
	}
	
	public ResultSet executeQuery(Connection conn, String sql){
		try {
			Statement stmt = conn.createStatement();
			return stmt.executeQuery(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return null;
		}
	}
}
