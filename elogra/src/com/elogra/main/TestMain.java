package com.elogra.main;

import com.elogra.db.DBConnection;

public class TestMain {

	public static void main(String[] args) {
		DBConnection dbc = new DBConnection();
		dbc.closeConnection();
	}

}
