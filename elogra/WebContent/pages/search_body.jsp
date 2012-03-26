<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


    
<form id="form1" name="form1" method="post" action="TestServlet" class="well">
  <p>
    <label>From</label>
    <select name="from" id="from">
    <option value=0>اختر</option>
    </select> 
    <select name="fromHS" id="fromHS">
	<option value=0>اختر</option>
    </select>
    <br />
<label>To</label>
    <select name="to" id="to">
	<option value=0>اختر</option>
    </select>
    <select name="toHS" id="toHS">
	<option value=0>اختر</option>
    </select>
    <br />
    <label>When</label> 
    <label></label>
    <input type="text" name="textfield" id="textfield" class="form-poshytip" title="When will you go?" />
  </p>
  <p>
    <div class="control-group">
    <label class="control-label">Type </label>
    <div class="controls">
    <label class="radio">
      <input type="radio" name="RadioGroup1" value="2" id="White" />
      White</label>
    <label class="radio">
      <input type="radio" name="RadioGroup1" value="3" id="Yellow" />
      Yellow</label>
    <label class="radio">
      <input type="radio" name="RadioGroup1" value="1" id="Black"/>
      Black</label>
    <label class="radio">
      <input type="radio" name="RadioGroup1" value="4" id="London"/>
      London</label>
      </div>
  	</div>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Search" class="btn btn-large" />
  </p>

</form>

<script type="text/javascript">
$(document).ready(function(){
  		
    loadCascadingCombo("from","fromHS");
    loadCascadingCombo("to","toHS");
	
    function loadCascadingCombo(parentId,childId){
        $.ajax({
            url: "Ajax?action=getTopLevelAreas",
            cache: false,
            dataType: "json",
            success: function(data){
                $.each(data, function(i, item) {
                    $("#"+parentId).append($('<option/>').val(data[i].id).text(data[i].name));
                });
			  
            },
            error: function(e, xhr){
                alert("error");
            }
        });
  		  		
	$("#"+parentId).change(function(){
                $.ajax({
                    url: "Ajax?action=getAreasUnder",
                    dataType: "json", 
                    data: {id : $(this).val()},
                    success: function(data) {
                        $("#"+childId).empty();
                        $.each(data, function(i, item) {
                            $("#"+childId).append($('<option/>').val(data[i].id).text(data[i].name));
                        });
                        $("#"+childId).trigger("change");
                    }});


        });
    }
	

	
});

</script>
