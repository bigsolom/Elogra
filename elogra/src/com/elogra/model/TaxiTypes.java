package com.elogra.model;

import java.util.HashMap;
import java.util.Map;


public enum TaxiTypes {
	black(1),white(2),yellow(3),london(4);
	private final int index;
	private static final Map<Integer,TaxiTypes> eValues = new HashMap<Integer, TaxiTypes>();
	
	static{
		for(TaxiTypes action: values()){
			eValues.put(action.index, action);
		}
	}
	
	public static TaxiTypes getEnum(int value){
		return eValues.get(value);
	}

	TaxiTypes(int index) {
		this.index = index;
	}

	public int index() {
		return index;
	}
}

