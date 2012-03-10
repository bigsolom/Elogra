package com.elogra.objects;

public class Comments {
	private String userName;
	private String comment;
	private String srcStreet;
	private String destStreet;
	private String fare;
	private int traffic;
	
	public int getTraffic() {
		return traffic;
	}
	public void setTraffic(int traffic) {
		this.traffic = traffic;
	}
	public String getUserName() {
		return userName;
	}
	public void setUserName(String userName) {
		this.userName = userName;
	}
	public String getComment() {
		return comment;
	}
	public void setComment(String comment) {
		this.comment = comment;
	}
	public String getSrcStreet() {
		return srcStreet;
	}
	public void setSrcStreet(String srcStreet) {
		this.srcStreet = srcStreet;
	}
	public String getDestStreet() {
		return destStreet;
	}
	public void setDestStreet(String destStreet) {
		this.destStreet = destStreet;
	}
	public String getFare() {
		return fare;
	}
	public void setFare(String fare) {
		this.fare = fare;
	}
}
