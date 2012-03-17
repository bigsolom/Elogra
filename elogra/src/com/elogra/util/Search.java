package com.elogra.util;

import java.util.ArrayList;

import com.elogra.db.DBConnection;
import com.elogra.db.DBConstants;
import com.elogra.model.Comments;
import com.elogra.model.Result;

public class Search {
	public Result goSearch(String srcID, String destID, String taxiType){
		
		Result res = new Result();
		
		DBConnection dbc = new DBConnection();
		String sql = "select * from " + DBConstants.LIVE_FARES + " where " + DBConstants.LIVE_FARES_SRC_ID + " = " + srcID + " and " + DBConstants.LIVE_FARES_DEST_ID + " = " + destID + " and " + DBConstants.LIVE_TAXI_TYPE + " = " + taxiType;
		System.out.println(sql);
		DBConnection.QueryResult qr = dbc.executeQuery(sql);
		
		res.setLiveFare(qr.getObject(0, DBConstants.LIVE_FARES_FARE).toString());
		
		sql = "select * from " + DBConstants.HISTORY_FARES + " where " + DBConstants.HISTORY_FARES_SRC_ID + " = " + srcID + " and " + DBConstants.HISTORY_FARES_DEST_ID + " = " + destID + " and " + DBConstants.HISTORY_TAXI_TYPE + " = " + taxiType;
		System.out.println(sql);
		qr = dbc.executeQuery(sql);
		res.setHistoryFare(qr.getObject(0, DBConstants.HISTORY_FARES_FARE).toString());

		
		Comments cmnt = null;
		ArrayList<Comments> cmntList = new ArrayList<Comments>();
		sql = "select * from " + DBConstants.ENTRIES + " where " + DBConstants.ENTRIES_SRC_ID + " = " + srcID + " and " + DBConstants.ENTRIES_DEST_ID + " = " + destID + " and " + DBConstants.ENTRIES_TAXI_TYPE + " = " + taxiType;
		System.out.println(sql);
		qr = dbc.executeQuery(sql);
		////////// get from another view
		for (int i = 0; i < qr.getRowsCount(); i++) {
			cmnt = new Comments();
			//cmnt.setDestStreet(qr.getObject(0, TableNames.ENTRIES_DEST_ADDR_ID).toString());
			//cmnt.setSrcStreet(qr.getObject(0, TableNames.ENTRIES_SRC_ADDR_ID).toString());
			cmnt.setUserName("elogra");
			cmnt.setTraffic(Integer.parseInt(qr.getObject(i, DBConstants.ENTRIES_TRAFFIC_STATUS).toString()));
			cmnt.setFare(qr.getObject(i, DBConstants.ENTRIES_FARE).toString());
			cmnt.setComment(qr.getObject(i, DBConstants.ENTRIES_COMMENT).toString());
			
			
			//String usrID = qr.getObject(i, TableNames.ENTRIES_USER_ID).toString();
			String destAddrID = qr.getObject(i, DBConstants.ENTRIES_DEST_ADDR_ID).toString();
			String srcAddrID = qr.getObject(i, DBConstants.ENTRIES_SRC_ADDR_ID).toString();
			
			sql = "select * from " + DBConstants.ADDRESSES + " where " + DBConstants.ADDRESSES_ID + " = " + srcAddrID;
			System.out.println(sql);
			DBConnection.QueryResult addrQR = dbc.executeQuery(sql);		
			cmnt.setSrcStreet(addrQR.getObject(0, DBConstants.ADDRESSES_TEXT).toString());

			sql = "select * from " + DBConstants.ADDRESSES + " where " + DBConstants.ADDRESSES_ID + " = " + destAddrID;
			System.out.println(sql);
			addrQR = dbc.executeQuery(sql);		
			cmnt.setDestStreet(addrQR.getObject(0, DBConstants.ADDRESSES_TEXT).toString());
			
			cmntList.add(cmnt);
		}		
		
		res.setComments(cmntList);
		
		dbc.closeConnection();
		return res;

	}

}
