$(document).ready(function() {
    $(".imgRadio").each(function() {
        $(this).css('border', "solid 2px transparent");
        $(this).click(function() {
            $(".imgRadio").each(function() {
                $(this).css('border', "solid 2px transparent");
            });
            $(this).css('border', "solid 2px red");
            $(this).css('border-radius', "5px");
            $("#imgRadio-input").val($(this).attr("data-value"));
        });
    });
        
    $('a.popup').live('click', function(){
        newwindow=window.open($(this).attr('href'),'','height=300,width=500');
        if (window.focus) {
            newwindow.focus()
            }
        return false;
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
        
function successMsg(msg){
    $("#alert-area").append($("<div id=\"error-alert\" class=\"alert alert-success\"><a class=\"close\" data-dismiss=\"alert\">×</a> <strong>"+msg+"</strong></div> "));
    $("#error-alert").delay(2000).fadeOut("slow", function () {
        $(this).remove();
    });
//$('html, body').animate({scrollTop:0}, 'slow');
}
        
function report(elem){
    var id = elem.getAttribute('data-id');
    var type = elem.getAttribute('data-type');
    $.ajax({
        url: reportURL,
        dataType: "json", 
        data: {
            'id':id,
            'type':type
        },
        complete: function(){//enable them back
            successMsg(reportMsg);
        },
        success: function(data) {

        }
    });
    // document.getElementById(id).style.display = 'none';
    elem.style.color = "gray";
    elem.onclick = function() {
        return false;
    }
}
        
function like(elem){
    var id = elem.getAttribute('data-id');
    /*alert(id);
            id = id.toString().substring(5, id.toString().length);
            alert(id);*/
    var type = elem.getAttribute('data-type');
    $.ajax({
        url: likeURL,
        dataType: "json", 
        data: {
            'id':id,
            'type':type
        },
        success: function(data) {
            if(data.status){
                var currNum = $('#no_likes_'+id).html();
                $('#no_likes_'+id).html(++currNum);
            }
        }
    });
    $(elem).replaceWith($('<span/>').text($(elem).text()).addClass("likes record-controls gray"));
}
        
function dislike(elem){
    var id = elem.getAttribute('data-id');
    var type = elem.getAttribute('data-type');
    $.ajax({
        url: likeURL,
        dataType: "json", 
        data: {
            'id':id,
            'type':type
        },
        success: function(data){//enable them back
            //  successMsg(reportMsg);
            if(data.status){    
                var currNum = $('#no_dislikes_'+id).html();
                $('#no_dislikes_'+id).html(++currNum);
            }
        }
    });
    $(elem).replaceWith($('<span/>').text($(elem).text()).addClass("dislikes record-controls gray"));
}

function addNick(){
    var name = prompt(enterNicknameMsg,defaultNick);
    if(name != null){
        $.ajax({
            async: false,    
            url: setNickUrl,
            dataType: "json", 
            data: {
                nick: name
            },
            beforeSend:function(){ //disable button and field
            //                $('#nick').attr("disabled","disabled");
            },
            complete: function(){//enable them back
            //                $("#fuzz").fadeOut();
            },
            success: function(data) {
            //                alert(data);
            }
        });
        //todo: add the new nick in ana: x
    }else{
        alert(noNicknameMsg);
    }
}