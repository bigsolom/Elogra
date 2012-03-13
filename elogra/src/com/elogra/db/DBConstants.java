package com.elogra.db;

public interface DBConstants {
	
	static final String ADDRESSES = "addresses";
	static final String ADDRESSES_ID = "id";
	static final String ADDRESSES_TEXT = "text";
	static final String ADDRESSES_AREA_ID = "area_id";
	
	static final String AREAS = "areas";
	static final String AREAS_ID = "id";
	static final String AREAS_NAME = "name";
	static final String AREAS_PARENT_ID = "parent_id";
	
	
	static final String ENTRIES = "entries";
	static final String ENTRIES_ID = "id";
	static final String ENTRIES_TAXI_TYPE = "taxi_type";
	static final String ENTRIES_TRIP_TIME = "trip_time";
	static final String ENTRIES_TRIP_DURATION = "tip_duration";
	static final String ENTRIES_COMMENT = "comment";
	static final String ENTRIES_FARE = "fare";
	static final String ENTRIES_TRAFFIC_STATUS = "traffic_status";
	static final String ENTRIES_SRC_ID = "src_id";
	static final String ENTRIES_DEST_ID = "dest_id";
	static final String ENTRIES_USER_ID = "user_id";
	static final String ENTRIES_SRC_ADDR_ID = "src_addr_id";
	static final String ENTRIES_DEST_ADDR_ID = "dest_addr_id";
	
	
	static final String HISTORY_FARES = "history_fares";
	static final String HISTORY_FARES_ID = "id";
	static final String HISTORY_FARES_FARE = "fare";
	static final String HISTORY_FARES_TIME_LAST_UPDATE = "time_last_update";
	static final String HISTORY_FARES_SRC_ID = "src_id";
	static final String HISTORY_FARES_DEST_ID = "dest_id";
	
	
	
	static final String LIVE_FARES = "live_fares";
	static final String LIVE_FARES_ID = "id";
	static final String LIVE_FARES_FARE = "fare";
	static final String LIVE_FARES_UPDATE = "time_last_update";
	static final String LIVE_FARES_SRC_ID = "src_id";
	static final String LIVE_FARES_DEST_ID = "dest_id";
	
	static final String USERS = "users";
	static final String USERS_ID = "id";
	
	
	
}
