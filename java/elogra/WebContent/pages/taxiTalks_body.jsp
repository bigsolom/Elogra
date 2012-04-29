<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<form id="form2" name="form2" method="post" action="hakawy" class="well">
<fieldset>
<textarea class="expand" 
id="taxiTalksInput" name="taxiTalksInput" maxlength="500"  onfocus="OnFocusInput (this)" onblur="OnBlurInput (this)" placeholder="قول للناس حدوتك"></textarea>
		<input type="submit" name="button" id="button" value="انشر" class="btn btn-large" />
	 </fieldset>
</form>
<script type="text/javascript" src="js/charcount.js"></script>
<!-- YAMLI CODE START -->
<script type="text/javascript" src="http://api.yamli.com/js/yamli_api.js"></script>

		<script type="text/javascript">
  if (typeof(Yamli) == "object" && Yamli.init( { uiLanguage: "ar" , startMode: "offOrUserDefault" } ))
  {
    Yamli.yamlify( "taxiTalksInput", { settingsPlacement: "inside" } );
  }
</script>
<!-- YAMLI CODE END -->
