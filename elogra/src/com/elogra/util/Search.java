package com.elogra.util;

import java.util.ArrayList;

import com.elogra.db.DBConnection;
import com.elogra.db.TableNames;
import com.elogra.model.Comments;
import com.elogra.model.Result;

public class Search {
	public Result goSearch(String srcID, String destID){
		
		Result res = new Result();
		
		DBConnection dbc = new DBConnection();
		String sql = "select * from " + TableNames.LIVE_FARES + " where " + TableNames.LIVE_FARES_SRC_ID + " = " + srcID + " and " + TableNames.LIVE_FARES_DEST_ID + " = " + destID;
		DBConnection.QueryResult qr = dbc.executeQuery(sql);
		
		res.setLiveFare(qr.getObject(0, TableNames.LIVE_FARES_FARE).toString());
		
		sql = "select * from " + TableNames.HISTORY_FARES + " where " + TableNames.HISTORY_FARES_SRC_ID + " = " + srcID + " and " + TableNames.HISTORY_FARES_DEST_ID + " = " + destID;
		qr = dbc.executeQuery(sql);
		res.setHistoryFare(qr.getObject(0, TableNames.HISTORY_FARES_FARE).toString());

		
		Comments cmnt = null;
		ArrayList<Comments> cmntList = new ArrayList<Comments>();
		sql = "select * from " + TableNames.ENTRIES + " where " + TableNames.ENTRIES_SRC_ID + " = " + srcID + " and " + TableNames.ENTRIES_DEST_ID + " = " + destID;
		qr = dbc.executeQuery(sql);
		////////// get from another view
		for (int i = 0; i < qr.getRowsCount(); i++) {
			cmnt = new Comments();
			//cmnt.setDestStreet(qr.getObject(0, TableNames.ENTRIES_DEST_ADDR_ID).toString());
			//cmnt.setSrcStreet(qr.getObject(0, TableNames.ENTRIES_SRC_ADDR_ID).toString());
			cmnt.setUserName("elogra");
			cmnt.setTraffic(Integer.parseInt(qr.getObject(i, TableNames.ENTRIES_TRAFFIC_STATUS).toString()));
			cmnt.setFare(qr.getObject(i, TableNames.ENTRIES_FARE).toString());
			cmnt.setComment(qr.getObject(i, TableNames.ENTRIES_COMMENT).toString());
			
			
			//String usrID = qr.getObject(i, TableNames.ENTRIES_USER_ID).toString();
			String destAddrID = qr.getObject(i, TableNames.ENTRIES_DEST_ADDR_ID).toString();
			String srcAddrID = qr.getObject(i, TableNames.ENTRIES_SRC_ADDR_ID).toString();
			
			sql = "select * from " + TableNames.ADDRESSES + " where " + TableNames.ADDRESSES_ID + " = " + srcAddrID;
			DBConnection.QueryResult addrQR = dbc.executeQuery(sql);		
			cmnt.setSrcStreet(addrQR.getObject(0, TableNames.ADDRESSES_TEXT).toString());

			sql = "select * from " + TableNames.ADDRESSES + " where " + TableNames.ADDRESSES_ID + " = " + destAddrID;
			addrQR = dbc.executeQuery(sql);		
			cmnt.setDestStreet(addrQR.getObject(0, TableNames.ADDRESSES_TEXT).toString());
			
			cmntList.add(cmnt);
		}		
		
		res.setComments(cmntList);
		
		dbc.closeConnection();
		return res;

	}

}
