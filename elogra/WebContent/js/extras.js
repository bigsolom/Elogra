
        function OnFocusInput (textarea) {
        
        	  $('textarea.expand').animate({
        	        height: "100em"
        	    }, 2);
        	  
        	  parseCharCounts();        	
        }
        function OnBlurInput (textarea) {
        	if($("textarea.expand").val()=="")
        		$("textarea.expand").animate({
  	        height: "20em"
  	    }, 2);
      	  
        }
    
        
        