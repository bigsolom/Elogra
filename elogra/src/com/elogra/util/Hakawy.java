package com.elogra.util;

import java.util.ArrayList;

import com.elogra.db.DBConnection;
import com.elogra.db.DBConstants;
import com.elogra.model.HakawyModel;

public class Hakawy {
	
	public ArrayList<HakawyModel> getHakawy(){
		ArrayList<HakawyModel> res = new ArrayList<HakawyModel>();
		HakawyModel hm = null;
		
		String sql = "SELECT * FROM " + DBConstants.HAKAWY + " LIMIT 0,10";
		try{
			DBConnection dbc = new DBConnection();
			DBConnection.QueryResult qr = dbc.executeQuery(sql);
			for (int i = 0; i < qr.getRowsCount(); i++) {
				hm = new HakawyModel();
				hm.setHekaya(qr.getObject(i, DBConstants.HAKAWY_TEXT).toString());
			}
			dbc.closeConnection();
		}catch (Exception e){
			e.printStackTrace();
		}
		return res;
	}
	
	public boolean submitHakawy(HakawyModel hm){
		String sql = "insert into " + DBConstants.HAKAWY + " values(null, 0, 0, '" + hm.getHekaya() + "', 0)";
		try{
			DBConnection dbc = new DBConnection();
			
			dbc.executeUpdate(sql);
			
			dbc.closeConnection();
		}catch (Exception e){
			e.printStackTrace();
		}
		return true;
	}

}
