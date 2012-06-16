/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
        
var scrlStart = false;        
        document.addEventListener("touchmove", ScrollStart, false);
        document.addEventListener("scroll", Scroll, false);

        function ScrollStart() {
            //start of scroll event for iOS
           // alert('scroll start');
          /* if  ($(window).scrollTop() == $(document).height() - $(window).height()){
             alert("bottom1");
             scrlStart = true;
           }*/
        }

        function Scroll() {
            //alert('scroll');
            //end of scroll event for iOS
            //and
            //start/end of scroll event for other browsers            
            if($(window).scrollTop() + $(window).height() == getDocHeight()) {
                //alert("bottom2");
                scrlStart = true;
            }
            if ($(document).height() - $(window).scrollTop() <= 1278) {
                //alert("bottom1");
                scrlStart = true;
            }
            if(scrlStart){
                getMore();
                scrlStart = false;
            }
            
        }
        
         function getDocHeight() {
    var D = document;
    return Math.max(
    Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
    Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
    Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    );          
}
        
        /*$(window).scroll(function(){
            if  ($(window).scrollTop() == $(document).height() - $(window).height()){//only when scrolling down
                       
                       getMore(); 
                       
                       
            }
        });*/
    
/*$(window).endlessScroll({
  fireOnce: false,
  fireDelay: false,
  callback: function(p){
    alert("test");
    if  ($(window).scrollTop() == $(document).height() - $(window).height()){//only when scrolling down
        getMore();
    }
  }
});*/

        function getMore(){
            //alert('getmore');
            if($(".paginated").attr('data-status')!="idle") return;
            if($(".paginated").attr('data-nomore')){
                if($('#end').length){
                    $('#end').remove();
                }
                $('.paginated').after("<div align='center' id='end' class='white'>"+noMoreMsg+"</div>");
                return;
            }
            $(".paginated").attr('data-status',"progress");
            $.ajax({
                url: moreActionURL,
                dataType: "json", 
                data: getPaginationData(),
                beforeSend:function(){ // Are not working with dataType:'jsonp'
                    $('.paginated').after("<div align='center'><img  id='loading' src='/img/progressbar.gif' /></div>");
                },
                complete: function(){
                    $('#loading').remove();
                },
                success: function(data) {
                    if(data.html.length){
                        $(".paginated").append(data.html);
                        var page = $(".paginated").attr('data-page');
                        page++;
                        $(".paginated").attr('data-page',page);
                    }else{
                        $(".paginated").attr('data-nomore',true);
                    }
                    $(".paginated").attr('data-status',"idle")
                }
             });
        }
         
         function getPaginationData(){
            var page = $(".paginated").attr('data-page');
            page++;
            var paginationData = {"page": page};
            if(typeof extraPaginationParams !== 'undefined'){//if it is passed
                for (var key in extraPaginationParams){//add it to the existing parameters
                    paginationData[key] = extraPaginationParams[key];
                }
            }
            return paginationData;
         } 
    });