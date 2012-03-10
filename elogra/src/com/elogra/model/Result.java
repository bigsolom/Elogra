package com.elogra.model;

import java.util.ArrayList;

public class Result {
	
	private String liveFare;
	private String historyFare;
	private ArrayList<Comments> comments;
	
	public String getLiveFare() {
		return liveFare;
	}
	public void setLiveFare(String liveFare) {
		this.liveFare = liveFare;
	}
	public String getHistoryFare() {
		return historyFare;
	}
	public void setHistoryFare(String historyFare) {
		this.historyFare = historyFare;
	}
	public ArrayList<Comments> getComments() {
		return comments;
	}
	public void setComments(ArrayList<Comments> comments) {
		this.comments = comments;
	}
}
