package com.elogra.model;

public class SubmitModel {
	private int srcID;
	private int destID;
	private int srcAddrID;
	private int destAddrID;
	private int trafficStat;
	private int taxiType;
	private int userID;
	private String fare;
	private String cmnt;
	private String srcAddr;
	private String destAddr;
	
	
	public int getUserID() {
		return userID;
	}
	public void setUserID(int userID) {
		this.userID = userID;
	}
	public int getTaxiType() {
		return taxiType;
	}
	public void setTaxiType(int taxiType) {
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
	public int getSrcID() {
		return srcID;
	}
	public void setSrcID(int srcID) {
		this.srcID = srcID;
	}
	public int getDestID() {
		return destID;
	}
	public void setDestID(int destID) {
		this.destID = destID;
	}
	public int getSrcAddrID() {
		return srcAddrID;
	}
	public void setSrcAddrID(int srcAddrID) {
		this.srcAddrID = srcAddrID;
	}
	public int getDestAddrID() {
		return destAddrID;
	}
	public void setDestAddrID(int destAddrID) {
		this.destAddrID = destAddrID;
	}
	public int getTrafficStat() {
		return trafficStat;
	}
	public void setTrafficStat(int trafficStat) {
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
