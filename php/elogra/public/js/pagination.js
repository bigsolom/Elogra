/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
        
        $(window).scroll(function(){
            if  ($(window).scrollTop() == $(document).height() - $(window).height()){//only when scrolling down
                       
                       getMore(); 
                       
                       
            }
        });
                
        function getMore(){
            if($(".paginated").attr('data-status')!="idle") return;
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
                    }
                    $(".paginated").attr('data-status',"idle")
                }
             });
        }
         
         function getPaginationData(){
            var page = $(".paginated").attr('data-page');
            page++;
            var paginationData = {"page": page};
//            var pageNumber = {"page": page};
//            paginationData.push(pageNumber);
            if(typeof extraPaginationParams !== 'undefined'){//if it is passed
                for (var key in extraPaginationParams){//add it to the existing parameters
                    paginationData[key] = extraPaginationParams[key];
                }
            }
            return paginationData;
         }
         
         
        
        
    });


