package com.elogra.db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Collection;
import java.util.HashMap;

import com.elogra.config.ConfigReader;

public class DBConnection {
	
	final static String DB_USERNAME = ConfigReader.getString("DBConnection.username"); //$NON-NLS-1$
	final static String DB_PASSWORD = ConfigReader.getString("DBConnection.password"); //$NON-NLS-1$
	final static String DB_HOST = ConfigReader.getString("DBConnection.host"); //$NON-NLS-1$
	final static String DB_NAME = ConfigReader.getString("DBConnection.dbName"); //$NON-NLS-1$
	
	private Connection conn;
	
	public Connection getConnection() {
		return conn;
	}

	public DBConnection(){
        try
        {
            String url = "jdbc:mysql://"+DB_HOST+"/"+DB_NAME; //$NON-NLS-1$ //$NON-NLS-2$
            Class.forName ("com.mysql.jdbc.Driver").newInstance (); //$NON-NLS-1$
            conn = DriverManager.getConnection (url, DB_USERNAME, DB_PASSWORD);
            System.out.println ("Database connection established"); //$NON-NLS-1$
            //return conn;
        }
        catch (Exception e)
        {
            System.err.println ("Cannelograot connect to database server"); //$NON-NLS-1$
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
	
	public QueryResult executeQuery(String sql, ArrayList params){
		try {
			PreparedStatement statement = conn.prepareStatement(sql);
			
			for (int i = 0; i < params.size(); i++) {
				if((params.get(i)) instanceof Integer){
					statement.setInt((i + 1), (Integer) params.get(i));
				}else if((params.get(i)) instanceof String){
					statement.setString((i + 1), (String) params.get(i));
				}
			}
			ResultSet rs = statement.executeQuery();
			QueryResult res = new QueryResult(rs);
			rs.close();
			statement.close();
			return res;
			
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}	
	
	public void closeConnection(){
		try {
			conn.close();
		} catch (SQLException e) {
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
