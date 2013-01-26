$(document).ready(function(){
    //on enter submit the form
    $('#comment').keypress(function(e){
        if(e.which == 13){
            e.preventDefault();
            addComment();
        }
    });
        
    //get the comments on hekaya
    $.ajax({
        url: getCommentsUrl,
        success: function(data) {
            $(".comments").append(data.html);
        }
    });
});
function sendCommentRequest(){
    nickSet = 1;
    $.ajax({
        url: sendCommentUrl,
        dataType: "json", 
        data: $('#commentForm').serialize(),
        beforeSend:function(){ //disable button and field
            $('#comment').attr("disabled","disabled");
        },
        complete: function(){//enable them back
            $('#comment').attr("value","");
            $('#comment').removeAttr("disabled");
        },
        success: function(data) {
            $(".comments").append(data.html);
            var currNum = $('#no_comments_'+id).html();
            $('#no_comments_'+id).html(++currNum);
        }
    });
}
    
function addComment(){
    if($("#comment").val() == ''){
        $("#alert-area").append($("<div id=\"error-alert\" class=\"alert alert-error\"><a class=\"close\" data-dismiss=\"alert\">×</a> <strong> قول حاجة</strong></div> "));
        $("#error-alert").delay(2000).fadeOut("slow", function () {
            $(this).remove();
        });                
        return false;
    }
    if(!nickSet){//no nickname
        addNick(sendCommentRequest);
    }else{
        sendCommentRequest();
    }
        
}