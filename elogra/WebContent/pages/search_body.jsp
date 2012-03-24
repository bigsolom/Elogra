<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


    <script type="text/javascript">
	var parents = "";
	var hostSpots = "";
	
	$(document).ready(function(){
alert("ready");
		$.post("getLookups.jsp", { parent : "null" }, function(data){
			$("#from").empty().append(data);
			if(parents.length > 0){
				$("option[label='" + parents +"']", "#from").attr("selected", "selected");
			}
			$("#from").trigger("change");
			
			$("#to").empty().append(data);
			if(parents.length > 0){
				$("option[label='" + parents +"']", "#to").attr("selected", "selected");
			}
			$("#to").trigger("change");
		});
		
		$("#from").change(function(){
			$.post("getLookups.jsp", { parent : $(this).val() }, function(data){
				$("#fromHS").empty().append(data);
				if(parents.length > 0){
					$("option[label='" + parents +"']", "#fromHS").attr("selected", "selected");
				}
				$("#fromHS").trigger("change");
			});
		});
		
		$("#to").change(function(){
			$.post("getLookups.jsp", { parent : $(this).val() }, function(data){
				$("#toHS").empty().append(data);
				if(parents.length > 0){
					$("option[label='" + parents +"']", "#toHS").attr("selected", "selected");
				}
				$("#toHS").trigger("change");
			});
		});
	});
	</script>
<form id="form1" name="form1" method="post" action="TestServlet">
  <p>
    <label>From</label>
    <select name="from" id="from">
	    <option value="1">٦ أكتوبر</option>
	    <option value="8">الشيخ زايد</option>
	    <option value="10">العجوزة</option>
    </select> 
    <select name="fromHS" id="fromHS">

    </select>
    <br />
<label>To</label>
    <select name="to" id="to">

    </select>
    <select name="toHS" id="toHS">

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
