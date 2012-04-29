package com.elogra.util;

import com.elogra.db.DBConnection;
import com.elogra.db.DBConstants;
import com.elogra.model.SubmitModel;

public class Update {

	
	public boolean updateLiveFares(SubmitModel sm){
//select * from entries where entries.entry_time > DATE_SUB(now(), INTERVAL 1 DAY) limit 0,5		
		DBConnection dbc = new DBConnection();
		String sql = "select * from " + DBConstants.LIVE_FARES + " where " + DBConstants.LIVE_FARES_SRC_ID + " = " + sm.getSrcID() + " and " + DBConstants.LIVE_FARES_DEST_ID + " = " + sm.getDestID() + " and " + DBConstants.LIVE_TAXI_TYPE + " = " + sm.getTaxiType();
		DBConnection.QueryResult qr = dbc.executeQuery(sql);
		
		System.out.println(sql);
		if(qr.getRowsCount() == 0){
			dbc.executeUpdate("insert into live_fares values(null," + sm.getFare() + ",now()," + sm.getSrcID() + "," + sm.getDestID() + "," + sm.getTaxiType() + ")");
			return true;
		}else{
			String liveFareID = qr.getObject(0, DBConstants.LIVE_FARES_ID).toString();
			sql = "select * from entries where  " 
		+ DBConstants.ENTRIES_SRC_ID + " = " + sm.getSrcID() 
		+ " and " + DBConstants.ENTRIES_DEST_ID + " = " + sm.getDestID() 
		+ " and " + DBConstants.ENTRIES_TAXI_TYPE + " = " + sm.getTaxiType() 
		+ " and " + DBConstants.ENTRIES_ENTRY_TIME + " > DATE_SUB(now(), INTERVAL 1 DAY) limit 0,5";
			System.out.println(sql);
			qr = dbc.executeQuery(sql);
			
			float fareSum = Float.parseFloat(sm.getFare());
			for (int i = 0; i < qr.getRowsCount(); i++) {
				fareSum += Float.parseFloat(qr.getObject(i, DBConstants.ENTRIES_FARE).toString());
			}
			
			fareSum = fareSum/(qr.getRowsCount() + 1);
			
			sql = "update live_fares set time_last_update = now(), fare = " + fareSum + " where id = " + liveFareID;
			dbc.executeUpdate(sql);
		}
		dbc.closeConnection();
		return false;
	}
}
