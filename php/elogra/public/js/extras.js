$(document).ready(function() {
	$(".imgRadio").each(function() {
		$(this).css('border', "solid 2px #E6E6E6");
		$(this).click(function() {
			$(".imgRadio").each(function() {
				$(this).css('border', "solid 2px #E6E6E6");
			});
			$(this).css('border', "solid 2px red");
			$(this).css('border-radius', "5px");
			$("#imgRadio-input").val($(this).attr("data-value"));
		});
	});
        
        
});

function OnFocusInput(textarea) {

		$('textarea.expand').animate({
			height : "100em"
		}, 2);

		parseCharCounts();
	}
	function OnBlurInput(textarea) {
		if ($("textarea.expand").val() == "")
			$("textarea.expand").animate({
				height : "20em"
			}, 2);

	}