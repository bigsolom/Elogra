package com.elogra.model;

import java.io.Serializable;

public class Areas implements Serializable {
	private String name;
	private Integer id;
	private int parentAreaId;
	private Areas parentArea;
	
	public Areas() {
		// TODO Auto-generated constructor stub
	}
	
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public Integer getId() {
		return id;
	}
	public void setId(Integer id) {
		this.id = id;
	}
	public int getParentAreaId() {
		return parentAreaId;
	}
	public void setParentAreaId(int parentAreaId) {
		this.parentAreaId = parentAreaId;
	}
	public Areas getParentArea() {
		return parentArea;
	}
	public void setParentArea(Areas parentArea) {
		this.parentArea = parentArea;
	}
}
