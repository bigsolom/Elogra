package com.elogra.util;

import com.elogra.db.DBConnection;
import com.elogra.db.DBConstants;

public class Report {
	
	public boolean reportHakawy(String id){
		DBConnection dbc = new DBConnection();
		String sql = "UPDATE " + DBConstants.HAKAWY + " SET "
				+ DBConstants.HAKAWY_STATUS + " = (" + DBConstants.HAKAWY_STATUS + " + 1)"
				+ " where " + DBConstants.HAKAWY_ID + " = " + id;
		dbc.executeUpdate(sql);
		return true;
	}
	
	public boolean reportEntry(String id){
		DBConnection dbc = new DBConnection();
		//update entries set status = (status+1) where id = 0
		String sql = "UPDATE " + DBConstants.ENTRIES + " SET "
				+ DBConstants.ENTRIES_STATUS + " = (" + DBConstants.ENTRIES_STATUS + " + 1)"
				+ " where " + DBConstants.ENTRIES_ID + " = " + id;
		dbc.executeUpdate(sql);
		return true;
	}

}
