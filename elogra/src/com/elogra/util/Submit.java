package com.elogra.util;

import com.elogra.db.DBConnection;
import com.elogra.db.TableNames;
import com.elogra.model.SubmitModel;

public class Submit {
	public boolean insertEntry(SubmitModel sm){
		/** Assuming no users exist and the main user is elogra with id = 1**/
		// check addresses and insert if new
		/// insert into entries
		//// update live fares
		DBConnection dbc = new DBConnection();
		String sql = "";
		dbc.executeUpdate(sql);

		
		dbc.closeConnection();
		return true;
	}
}