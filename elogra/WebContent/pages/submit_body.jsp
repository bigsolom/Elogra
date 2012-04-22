<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt" %>

<form id="form2" name="form2" method="post" action="submit"
	class="well">
	<fieldset>
		 <label><fmt:message key="form.submit.fare"/></label> <label></label> <input type="text"
			name="fare" id="fare" class="form-poshytip"
			title="$ $ $" />
		<label><fmt:message key="form.search.from"/></label> <select name="from" id="from">
			<option value=0>اختر</option>
		</select> <select name="fromHS" id="fromHS">
			<option value=0>اختر</option>
		</select>
		<label><fmt:message key="form.submit.Addr"/></label> <label></label> <input type="text"
			name="fromAddr" id="fromAddr" class="form-poshytip"
			title="Address" /> 
		<label><fmt:message key="form.search.to"/></label> <select name="to" id="to">
			<option value=0>اختر</option>
		</select> <select name="toHS" id="toHS">
			<option value=0>اختر</option>
		</select>
			<label><fmt:message key="form.submit.Addr"/></label> <label></label> <input type="text"
			name="toAddr" id="toAddr" class="form-poshytip"
			title="Address" />
		 <label><fmt:message key="form.search.when"/></label> <label></label> <input type="text"
			name="when" id="when" class="form-poshytip"
			title="When will you go?" />
		<div class="control-group">
			<label class="control-label"><fmt:message key="form.search.type"/> </label>
			<div class="controls">
				<img class="imgRadio" src="img/blackTaxis.jpg" data-value="1" />
						<img class="imgRadio" src="img/whiteTaxis.jpg" data-value="2" />
						<img class="imgRadio" src="img/yellowTaxis.jpg" data-value="3" />
						<img class="imgRadio" src="img/londonTaxis.jpg" data-value="4" />
						<input type="hidden" id="imgRadio-input" name="imgRadio-input" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"><!--<fmt:message key="form.search.type"/>--> Traffic </label>
			<div class="controls">
				<label class="radio"> <input type="radio" name="traffic"
					value="2" id="White" /> Medium
				</label>
				 <label class="radio"> <input type="radio"
					name="traffic" value="3" id="Yellow" /> Za7ma
				</label>
				 <label class="radio"> <input type="radio"
					name="traffic" value="1" id="Black" /> Fadia
				</label>
			</div>
		</div>
			<label><fmt:message key="form.submit.comment"/></label> 
			<label></label> 
			<textarea type="text" name="comment" id="comment" class="form-poshytip" title="Comments" rows="4" cols="400"></textarea><br />
		
		<input type="submit" name="button" id="button" value="<fmt:message key='form.submit.submit'/>" class="btn btn-large" />
	</fieldset>
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
