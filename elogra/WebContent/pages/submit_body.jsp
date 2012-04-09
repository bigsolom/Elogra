<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt" %>

<form id="form2" name="form2" method="post" action="search"
	class="well">
	<fieldset>
		 <label><fmt:message key="form.submit.fare"/></label> <label></label> <input type="text"
			name="textfield" id="textfield" class="form-poshytip"
			title="$ $ $" />
		<label><fmt:message key="form.search.from"/></label> <select name="from" id="from">
			<option value=0>اختر</option>
		</select> <select name="fromHS" id="fromHS">
			<option value=0>اختر</option>
		</select>
		<label><fmt:message key="form.submit.Addr"/></label> <label></label> <input type="text"
			name="textfield" id="textfield" class="form-poshytip"
			title="Address" /> 
		<label><fmt:message key="form.search.to"/></label> <select name="to" id="to">
			<option value=0>اختر</option>
		</select> <select name="toHS" id="toHS">
			<option value=0>اختر</option>
		</select>
			<label><fmt:message key="form.submit.Addr"/></label> <label></label> <input type="text"
			name="textfield" id="textfield" class="form-poshytip"
			title="Address" />
		 <label><fmt:message key="form.search.when"/></label> <label></label> <input type="text"
			name="textfield" id="textfield" class="form-poshytip"
			title="When will you go?" />
		<div class="control-group">
			<label class="control-label"><fmt:message key="form.search.type"/> </label>
			<div class="controls">
				<label class="radio"> <input type="radio" name="RadioGroup1"
					value="2" id="White" /> White
				</label> <label class="radio"> <input type="radio"
					name="RadioGroup1" value="3" id="Yellow" /> Yellow
				</label> <label class="radio"> <input type="radio"
					name="RadioGroup1" value="1" id="Black" /> Black
				</label> <label class="radio"> <input type="radio"
					name="RadioGroup1" value="4" id="London" /> London
				</label>
			</div>
		</div>
			<label><fmt:message key="form.submit.comment"/></label> <label></label> <textarea type="text"
			name="textfield" id="textfield" class="form-poshytip"
			title="Comments" rows="4" cols="400"></textarea><br />
		<input type="submit" name="button" id="button" value="<fmt:message key='form.submit.submit'/>"
			class="btn btn-large" />
	</fieldset>
</form>
