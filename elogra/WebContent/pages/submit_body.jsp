<%@ page contentType="text/html; charset=UTF-8" language="java" import="java.sql.*" errorPage="" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="test">From</label>
    <select name="test" id="test">
    </select> 
    <select name="test" id="test">
    </select>
    <br />
<label for="test">To</label>
    <select name="test" id="test">
    </select>
    <select name="test2" id="test2">
    </select>
    <br />
    <label for="test3">When</label> 
    <label for="textfield"></label>
    <input type="text" name="textfield" id="textfield" />
  </p>
  <p>
    <label for="test4">Type </label>
    <label>
      <input type="radio" name="RadioGroup1" value="White" id="RadioGroup1_0" />
      White</label>
    <br />
    <label>
      <input type="radio" name="RadioGroup1" value="Yellow" id="RadioGroup1_1" />
      Yellow</label>
    <br />
    <label>
      <input type="radio" name="RadioGroup1" value="Black" id="RadioGroup1_2" />
      Black</label>
    <br />
    <label>
      <input type="radio" name="RadioGroup1" value="London" id="RadioGroup1_3" />
      London</label>
    <br />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Search" />
  </p>
</form>
</body>
</html>