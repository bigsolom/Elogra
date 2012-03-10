package com.elogra.db;

import java.sql.Connection;
import java.sql.DriverManager;

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
}
