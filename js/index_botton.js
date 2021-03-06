/* 목차리스트를 고정해서 볼 수 있는 버튼을 만들어 줍니다.
   author: Damezuma
*/
var width = $(window).width();
if($("#toc").html() && width > 1649) {
    var content_where = $(".libertyzeta-content-header").offset();
    var a = "<button type=\"button\" class=\"btn btn-primary\" aria-label=\"Left Align\">  <span class=\"fa fa-list\" aria-hidden=\"true\"></span></button>";
    var indexButton = document.createElement("button");
    indexButton.id = "fixed-toc-button";
    indexButton.type = "button";
    indexButton.className = "btn btn-primary";
    indexButton.innerHTML = "<span class=\"fa fa-list\" aria-hidden=\"true\"></span>";
    indexButton.style.position = "fixed";
    indexButton.style.top = content_where.top + "px";
    indexButton.style.left = (content_where.left - 47 - 15 )+ "px";
    window.damezuma = {doc:null};
    $(indexButton).click(function(){
        $(indexButton).fadeOut(200);
        if(window.damezuma.doc == null){
            window.damezuma.doc = $("#toc").clone();
            $(document.body).append(window.damezuma.doc);
            $(window.damezuma.doc).css({
                "position":"fixed",
                "top":44,
                "left":0,
                "background-color":"#f5f8fa",
                "border-right":"1px solid #e1e8ed",
                "color":"#373a3c",
                "padding":"16px",
                "bottom":0,
                "overflow-y":"auto",
                "display":"none",
                "max-width":"200px",
                "z-index":3000
            });
            window.damezuma.doc[0].id = "fixed-toc";
            window.damezuma.doc.fadeIn(200);
            $("#fixed-toc #togglelink").click(function(){
                $("#fixed-toc-button").fadeIn(200);
                $(window.damezuma.doc).remove();
                window.damezuma.doc = null;
                return false;
            });

            /* 왼쪽목차 클릭시 처리 */
            var nav_height = $('.nav-wrapper').height();
            $("#fixed-toc ul li > a").click(function(){
                if ($(this).attr('href') [0] == '#') {
                    var id = $(this).attr('href') + "";
                    if(id.indexOf(".") != -1) {
                        id = document.getElementById(id.replace("#",""));
                    }
                    $('html,body').animate({
                        scrollTop: ($(id).offset().top - nav_height - 10)
                    }, 350);
                    return false;
                }
            });
            /* 왼쪽목차 클릭시 처리 End */
        }


    });

    $(document.body).append(indexButton);
}