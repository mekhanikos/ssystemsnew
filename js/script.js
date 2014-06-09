/**
 * Created by harut.margaryan on 5/5/14.
 */

var global_self = null;

$(document).ready(function(){

    $('.soc').mouseover(function(){
        $(this).animate({top: "0"}, 500);
    }).mouseout(function(){
        $(this).animate({top: "15px"}, 500);
    });

    $('.menu_item').mouseover(function(){
        if($(this).attr("class") != "menu_item list")
            $(this).filter(':not(:animated)').animate({left: "230px"}, 300);

    }).mouseout(function(){
        var curr = $(this);
        setTimeout(function() {
            //console.log(curr.attr("class"));
            if(curr.attr("class") != "menu_item list")
                curr.animate({left: "0"}, 200);
        }, 250);

        //$(this).css("left", "0");
    });

    $('.menu_item2').mouseover(function(){
        $(this).animate({left: "200px"}, 500);

    }).mouseout(function(){
        var curr = $(this);
        setTimeout(function() {
            //console.log(curr.attr("class"));
            //if(curr.attr("class") != "menu_item list")
                curr.stop(true, false).animate({left: "0"}, 200);
        }, 350);

        //$(this).css("left", "0");
    });


    $(".bottle").mouseover(function(){
        //$(this).animate({top: "-130px"}, { duration: 500, queue: false });
       // $(this).animate({height: "279px"}, { duration: 1000, queue: false });
        setTimeout(function() {
            if($(".tear").is(":visible"))
            {
                $(".tear").filter(':not(:animated)').animate({top: "200px"}, { duration: 1500, queue: false, complete: function(){
                    $(".tear").css("top", "10px");
                    $(".tear").show(0, function() {
                        $(".hand").removeClass("clean");
                        if($(".bottle").css("height") == "279px")
                            $('.bottle').trigger("mouseover");
                    });

                }});
            }
                setTimeout(function(){
                   //if($(".tear").is(":visible"))
                        $(".hand").addClass("clean");
                }, 550);

            $(".tear").hide(1500, function(){
                //$(".tear").css("top", "10px");

            });

        }, 350);
    }).mouseout(function(){
        $(".tear").show();
        $(".hand").removeClass("clean");
    });

    $(".black").click(function(){
        $(".black").hide();
    });

    $(".message_text").click(function(){
        $(".black").hide();
    });



});























