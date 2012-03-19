package com.elogra.db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Collection;
import java.util.HashMap;

public class DBConnection {
	
	final static String DB_USERNAME = "root";
	final static String DB_PASSWORD = "root";
	
	private Connection conn;
	
	public DBConnection(){
        try
        {
            String url = "jdbc:mysql://localhost/elogra";
            Class.forName ("com.mysql.jdbc.Driver").newInstance ();
            conn = DriverManager.getConnection (url, DB_USERNAME, DB_PASSWORD);
            System.out.println ("Database connection established");
            //return conn;
        }
        catch (Exception e)
        {
            System.err.println ("Cannot connect to database server");
            e.printStackTrace();
            //return null;
        }

	}
	
	public boolean executeUpdate(String sql){
		try {
			Statement stmt = conn.createStatement();
			boolean res = stmt.execute(sql);
			stmt.close();
			//closeConnection(conn);
			return res;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}
	}
	
	public QueryResult executeQuery(String sql){
		try {
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			QueryResult res = new QueryResult(rs);
			rs.close();
			stmt.close();
			//closeConnection(conn);
			return res;
			
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return null;
		}
	}
	
	public void closeConnection(){
		try {
			conn.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	public class QueryResult {

        private HashMap<Integer, Object[]> resultRows = new HashMap<Integer, Object[]>();
        private HashMap<String, Integer> columnIndexes = new HashMap<String, Integer>();
        private int colCount;
        private int rowsCount;
        //private Logger logger = Logger.getLogger(this.getClass());
        private Collection<String> headers = new ArrayList<String>();

        public QueryResult(ResultSet rs) throws Exception {
            ResultSetMetaData rsmd = rs.getMetaData();
            colCount = rsmd.getColumnCount();


            for (int i = 1; i <= colCount; i++) {
                columnIndexes.put(rsmd.getColumnName(i).toUpperCase(), i - 1);
                headers.add(rsmd.getColumnName(i));
            }

            int rowId = 0;
            while (rs.next()) {
                //logger.debug("Parsing rowId:" + rowId);
                Object[] row = new Object[colCount];

                for (int i = 1; i <= colCount; i++) {
                    row[i - 1] = rs.getObject(i);
                }
                resultRows.put(rowId, row);
                rowId++;
            }

            rowsCount = rowId;
        }
        
        public Collection<String> getHeaders(){
            return headers;
        }

        public Object getObject(int rowId, String columnName) {
            Integer colId = columnIndexes.get(columnName.toUpperCase());
            if (colId != null) {
                return getObject(rowId, colId.intValue());
            }
            return null;
        }

        public Object getObject(int rowId, int colId) {
            Object[] row = resultRows.get(rowId);
            if (row != null && row.length > colId) {
                return row[colId];
            }
            return null;
        }

        public int getColCount() {
            return colCount;
        }

        public int getRowsCount() {
            return rowsCount;
        }
    }
}
