<%@ page contentType="text/html; charset=UTF-8" language="java" import="java.sql.*" errorPage="" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="TestServlet">
  <p>
    <label>From</label>
    <select name="from" id="from">
    <option value="1">٦ أكتوبر</option>
    <option value="8">الشيخ زايد</option>
    <option value="10">العجوزة</option>
    </select> 
    <select name="fromHS" id="fromHS">
    <option value="9">هايبر وان</option>
    <option value="2">ميدان الحصري</option>
    <option value="3">المنطقة الصناعية</option>
    <option value="4">ميدان فودافون</option>
    <option value="5">الحي المتميز</option>
    <option value="6">ميدان ليلة القدر</option>
    <option value="7">نادي ٦ أكتوبر</option>
    <option value="0">ميدان جهينة</option>
    </select>
    <br />
<label>To</label>
    <select name="to" id="to">
    <option value="1">٦ أكتوبر</option>
    <option value="8">الشيخ زايد</option>
    <option value="10">العجوزة</option>
    </select>
    <select name="toHS" id="toHS">
    <option value="9">هايبر وان</option>
    <option value="2">ميدان الحصري</option>
    <option value="3">المنطقة الصناعية</option>
    <option value="4">ميدان فودافون</option>
    <option value="5">الحي المتميز</option>
    <option value="6">ميدان ليلة القدر</option>
    <option value="7">نادي ٦ أكتوبر</option>
    <option value="0">ميدان جهينة</option>
    </select>
    <br />
    <label>When</label> 
    <label></label>
    <input type="text" name="textfield" id="textfield" />
  </p>
  <p>
    <label>Type </label>
    <label>
      <input type="radio" name="RadioGroup1" value="2" id="White" />
      White</label>
    <br />
    <label>
      <input type="radio" name="RadioGroup1" value="3" id="Yellow" />
      Yellow</label>
    <br />
    <label>
      <input type="radio" name="RadioGroup1" value="1" id="Black" />
      Black</label>
    <br />
    <label>
      <input type="radio" name="RadioGroup1" value="4" id="London" />
      London</label>
    <br />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Search" />
  </p>
</form>
</body>
</html>