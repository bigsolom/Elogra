package com.elogra.util;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;

import com.elogra.db.DBConnection;
import com.elogra.db.TableNames;
import com.elogra.objects.Result;

public class Search {
	public Result goSearch(String srcID, String destID){
		
		String sql = "select * from " + TableNames.LIVE_FARES + " where src_id = "+srcID + " and dest_id = " + destID;
		
		DBConnection dbc = new DBConnection();
		Connection conn = dbc.getConnection();
		ResultSet rs = dbc.executeQuery(conn, sql);
		
		
		
		return null;

	}

}
