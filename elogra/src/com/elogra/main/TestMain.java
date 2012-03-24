package com.elogra.main;

import java.util.ArrayList;

import com.elogra.db.DBConnection;

public class TestMain {

	public static void main(String[] args) {
		DBConnection dbc = new DBConnection();
		String s = "";
		int x = 0;
		//System.out.println(dbc.getClass().toString());
		//System.out.println(s.getClass().toString());
		ArrayList test = new ArrayList();
		test.add(x);
		System.out.println(test.get(0).getClass().toString());
		dbc.closeConnection();
	}

}
