package com.elogra.model;

public class SubmitModel {
	private String srcID;
	private String destID;
	private String srcAddrID;
	private String destAddrID;
	private String trafficStat;
	private String taxiType;
	private String userID;
	private String fare;
	private String cmnt;
	private String srcAddr;
	private String destAddr;
	
	
	public String getUserID() {
		return userID;
	}
	public void setUserID(String userID) {
		this.userID = userID;
	}
	public String getTaxiType() {
		return taxiType;
	}
	public void setTaxiType(String taxiType) {
		this.taxiType = taxiType;
	}
	public String getSrcAddr() {	
		return srcAddr;
	}
	public void setSrcAddr(String srcAddr) {
		this.srcAddr = srcAddr;
	}
	public String getDestAddr() {
		return destAddr;
	}
	public void setDestAddr(String destAddr) {
		this.destAddr = destAddr;
	}	
	public String getSrcID() {
		return srcID;
	}
	public void setSrcID(String srcID) {
		this.srcID = srcID;
	}
	public String getDestID() {
		return destID;
	}
	public void setDestID(String destID) {
		this.destID = destID;
	}
	public String getSrcAddrID() {
		return srcAddrID;
	}
	public void setSrcAddrID(String srcAddrID) {
		this.srcAddrID = srcAddrID;
	}
	public String getDestAddrID() {
		return destAddrID;
	}
	public void setDestAddrID(String destAddrID) {
		this.destAddrID = destAddrID;
	}
	public String getTrafficStat() {
		return trafficStat;
	}
	public void setTrafficStat(String trafficStat) {
		this.trafficStat = trafficStat;
	}
	public String getFare() {
		return fare;
	}
	public void setFare(String fare) {
		this.fare = fare;
	}
	public String getCmnt() {
		return cmnt;
	}
	public void setCmnt(String cmnt) {
		this.cmnt = cmnt;
	}
}
