<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@taglib prefix="fmt" uri="http://java.sun.com/jsp/jstl/fmt" %>

<!-- TABS -->
					<!-- the tabs -->
					<ul class="tabs">
						<li><a href="#">Search</a></li>
						<li><a href="#">News</a></li>
						<li><a href="#">Recent videos</a></li>
						<li><a href="#">Latest gallery</a></li>
						
				  </ul>
					
					<!-- tab "panes" -->
					<div class="panes">
					
						<!-- Information  -->
						<div>
							
							<form id="form1" name="form1" method="post" action="search"
	class="well">
	<fieldset>
		<label><fmt:message key="form.search.from"/></label> <select name="from" id="from">
			<option value=0>اختر</option>
		</select> <select name="fromHS" id="fromHS">
			<option value=0>اختر</option>
		</select> <label><fmt:message key="form.search.to"/></label> <select name="to" id="to">
			<option value=0>اختر</option>
		</select> <select name="toHS" id="toHS">
			<option value=0>اختر</option>
		</select> <label><fmt:message key="form.search.when"/></label> <label></label> <input type="text"
			name="textfield" id="textfield" class="form-poshytip"
			title="When will you go?" />
				<div class="control-group">
					<label class="control-label"><fmt:message
							key="form.search.type" /> </label>

					<div class="controls">
						<img class="imgRadio" src="img/blackTaxis.jpg" data-value="1" /> <img
							class="imgRadio" src="img/whiteTaxis.jpg" data-value="2" /> <img
							class="imgRadio" src="img/yellowTaxis.jpg" data-value="3" /> <img
							class="imgRadio" src="img/londonTaxis.jpg" data-value="4" /> <input
							type="hidden" id="imgRadio-input" name="imgRadio-input" />
					</div>
				</div>
				<input type="submit" name="button" id="button" value="<fmt:message key='form.search.search'/>"
			class="btn btn-large" />
	</fieldset>
</form>
<script type="text/javascript">
$(document).ready(function(){
  		
    loadCascadingCombo("from","fromHS");
    loadCascadingCombo("to","toHS");
    
    $(".imgRadio").each(function(){
    	$(this).css('border', "solid 2px #E6E6E6");
    	$(this).click(function() {
    		$(".imgRadio").each(function(){
    			$(this).css('border', "solid 2px #E6E6E6");
    		});
    		$(this).css('border', "solid 2px red");
    		$(this).css('border-radius', "5px");
    		$("#imgRadio-input").val($(this).attr("data-value"));
    	});
    });
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
						
						</div>
						<!-- ENDS Information -->
						
						<!-- Post list -->
						<div>
							<ul class="blocks-list">
								<li>
									<a href="single.html" class="border"><img src="img/dummies/114x86.jpg" alt="Post" /></a>
									<div class="the-excerpt">
										<strong>Pellentesque habitant morbi tristique</strong>  senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.																			<a href="single.html" class="link-arrow">Read more &#8594;</a>
									</div>
								</li>
								<li>
									<a href="single.html" class="border"><img src="img/dummies/114x86.jpg" alt="Post" /></a>
									<div class="the-excerpt">
										<strong>Pellentesque habitant morbi tristique</strong>  senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.																			<a href="single.html" class="link-arrow">Read more &#8594;</a>
									</div>
								</li>
								<li>
									<a href="single.html" class="border"><img src="img/dummies/114x86.jpg" alt="Post" /></a>
									<div class="the-excerpt">
										<strong>Pellentesque habitant morbi tristique</strong>  senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.																			<a href="single.html" class="link-arrow">Read more &#8594;</a>
									</div>
								</li>
							</ul>
						</div>
						<!-- ENDS Post list -->
					
						
						<!-- img gallery -->
						<div>
							<ul class="blocks-gallery">
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a class="border" href="http://www.youtube.com/watch?v=twuScTcDP_Q" title="The Video" rel="prettyPhoto"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
							</ul>
						</div>
						<!-- ENDS img gallery -->
						
						<!-- img gallery -->
						<div>
							<ul class="blocks-gallery">
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
								<li><a href="img/dummies/584x300.jpg" class="border fancybox" title="An image"><img src="img/dummies/114x86.jpg" alt="Post" /></a></li>
							</ul>
						</div>
						<!-- ENDS img gallery -->
						
					</div>
					<!-- ENDS TABS -->


