package com.elogra.util;

import com.elogra.db.DBConnection;
import com.elogra.db.DBConstants;
import com.elogra.model.SubmitModel;

public class Submit {
	public boolean insertEntry(SubmitModel sm){
		/** Assuming no users exist and the main user is elogra with id = 1**/
		// check addresses and insert if new
		/// insert into entries
		//insert into entries values(0,1,now(),'01:30','Comment',10,1,0,2,0,0,0);
		//// update live fares
		DBConnection dbc = new DBConnection();
///////////// check for source address if already available
		String sql = "select * from " + DBConstants.ADDRESSES + " where " + DBConstants.ADDRESSES_TEXT + " like '" + sm.getSrcAddr() + "'";
		System.out.println(sql);
		DBConnection.QueryResult qr = dbc.executeQuery(sql);		
		if(qr.getRowsCount() == 0){
			dbc.executeUpdate("insert into " + DBConstants.ADDRESSES + " values(null,'" + sm.getSrcAddr() + "'," + sm.getSrcID() + ")");
			sql = "select * from " + DBConstants.ADDRESSES + " where " + DBConstants.ADDRESSES_TEXT + " = '" + sm.getSrcAddr() + "'";
			System.out.println(sql);
			qr = dbc.executeQuery(sql);
			sm.setSrcAddrID(Integer.parseInt(qr.getObject(0, DBConstants.ADDRESSES_ID).toString()));
		}else{
			sm.setSrcAddrID(Integer.parseInt(qr.getObject(0, DBConstants.ADDRESSES_ID).toString()));
		}
///////////// check for destination address if already available		
		sql = "select * from " + DBConstants.ADDRESSES + " where " + DBConstants.ADDRESSES_TEXT + " like '" + sm.getDestAddr() + "'";
		System.out.println(sql);
		qr = dbc.executeQuery(sql);
		if(qr.getRowsCount() == 0){
			dbc.executeUpdate("insert into " + DBConstants.ADDRESSES + " values(null,'" + sm.getDestAddr() + "'," + sm.getDestID() + ")");
			sql = "select * from " + DBConstants.ADDRESSES + " where " + DBConstants.ADDRESSES_TEXT + " = '" + sm.getDestAddr() + "'";
			System.out.println(sql);
			qr = dbc.executeQuery(sql);
			sm.setDestAddrID(Integer.parseInt(qr.getObject(0, DBConstants.ADDRESSES_ID).toString()));
		}else{
			sm.setDestAddrID(Integer.parseInt(qr.getObject(0, DBConstants.ADDRESSES_ID).toString()));
		}		
/////////////////////////////////////////// insert a new entry //////////////////////////////////////////////////////		
		
		sql = "insert into entries values(null," + sm.getTaxiType() + ",now(),'00:00','" + sm.getCmnt() + "'," + sm.getFare() +
				"," + sm.getTrafficStat() + "," + sm.getSrcID() + "," + sm.getDestID() + "," + sm.getUserID() + 
				"," + sm.getSrcAddrID() + "," + sm.getDestAddrID() + " , now());";
		System.out.println(sql);
		dbc.executeUpdate(sql);
///////////////////////////////////////////// update live fares //////////////////////////////////////////////
		Update su = new Update();
		su.updateLiveFares(sm);
		
		dbc.closeConnection();
		return true;
	}
}