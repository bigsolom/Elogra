<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConstants
 *
 * @author efoad
 */
class Application_Model_DBConstants {
    //put your code here
    	const ADDRESSES = "addresses";
	const ADDRESSES_ID = "id";
	const ADDRESSES_TEXT = "text";
	const ADDRESSES_AREA_ID = "area_id";
	
	const AREAS = "areas";
	const AREAS_ID = "id";
	const AREAS_NAME = "name";
	const AREAS_PARENT_ID = "parent_id";
	const AREAS_APPROVED = "approved";
	
	
	const ENTRIES = "entries";
	const ENTRIES_ID = "id";
	const ENTRIES_TAXI_TYPE = "taxi_type";
	const ENTRIES_TRIP_TIME = "trip_time";
	const ENTRIES_TRIP_DURATION = "tip_duration";
	const ENTRIES_COMMENT = "comment";
	const ENTRIES_FARE = "fare";
	const ENTRIES_TRAFFIC_STATUS = "traffic_status";
	const ENTRIES_SRC_ID = "src_id";
	const ENTRIES_DEST_ID = "dest_id";
	const ENTRIES_USER_ID = "user_id";
	const ENTRIES_SRC_ADDR_ID = "src_addr_id";
	const ENTRIES_DEST_ADDR_ID = "dest_addr_id";
	const ENTRIES_ENTRY_TIME = "entry_time";
	const ENTRIES_STATUS = "status";
	
	
	const HISTORY_FARES = "history_fares";
	const HISTORY_FARES_ID = "id";
	const HISTORY_FARES_FARE = "fare";
	const HISTORY_FARES_TIME_LAST_UPDATE = "time_last_update";
	const HISTORY_FARES_SRC_ID = "src_id";
	const HISTORY_FARES_DEST_ID = "dest_id";
	const HISTORY_TAXI_TYPE = "taxi_type";
	
	const LIVE_FARES = "live_fares";
	const LIVE_FARES_ID = "id";
	const LIVE_FARES_FARE = "fare";
	const LIVE_FARES_UPDATE = "time_last_update";
	const LIVE_FARES_SRC_ID = "src_id";
	const LIVE_FARES_DEST_ID = "dest_id";
	const LIVE_TAXI_TYPE = "taxi_type";
	
	const USERS = "users";
	const USERS_ID = "id";
	
	const HAKAWY = "hakawy";
	const HAKAWY_ID = "id";
	const HAKAWY_USERID = "userid";
	const HAKAWY_DRIVERID = "driverid";
	const HAKAWY_TEXT = "text";
	const HAKAWY_STATUS = "status";
        const HAKAWY_LIKE = "likes";
        const HAKAWY_DISLIKE = "dislikes";
        
        const REPORT_TYPE_HAKAWY = 'hakawy';
        const REPORT_TYPE_ENTRIES = 'entries';
}

?>
