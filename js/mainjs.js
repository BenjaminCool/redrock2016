/* 
 /*victor reyes js
 */


//responsive adjustments to main container 


var addEvent = function(obj, type, callback, eventReturn)
{
    if(obj == null || typeof obj === 'undefined')
        return;

    if(obj.addEventListener)
        obj.addEventListener(type, callback, eventReturn ? true : false);
    else if(obj.attachEvent)
        obj.attachEvent("on" + type, callback);
    else
        obj["on" + type] = callback;
};

var ajustar = function() {


    var mainrr = document.querySelector(".menu_main_redrock");


    var footerme = document.querySelector(".footer");

    if ($("#mainrr").height() > $(window).height()) {
        
        // Overflow detected; force scroll bar
        mainrr.style.position = "static";
        mainrr.style.transform = "translateY(0)";
        mainrr.style.width = "100%";
        mainrr.style.top = "0px";
        footerme.style.position = "relative";
// console.log("axaxaxaxa");

    } else {
        
        // No overflow; force center content
        footerme.style.position = "absolute";
        mainrr.style.position = "absolute";
        mainrr.style.overflow = "hidden";
        mainrr.style.transform = "translateY(-50%)";
        mainrr.style.width = "100%";
        mainrr.style.top = "50%";
        //  console.log("ololololol");
    }
}


window.onresize = function () {
    ajustar();
};

//window.onload = function () {
//    ajustar();
//};

addEvent(window, 'resize', ajustar, true);


//


// animations

var $buttnorm = $('.buttonbox01');

var horatxt = $('#horatxtid');

//$hora.hover(
//        function () {
//            TweenLite.to($(this), 0.2, {scale: 1.2});
//        },
//        function () {
//            TweenLite.to($(this), 0.2, {scale: 1});
//        }
//);

var tween = TweenMax.from(".horatxt", 1, {x: "300px", Delay: 0.5, ease: Elastic.easeInOut});
var tween = TweenMax.from(".hora", 1, {x: "-300px", Delay: 1, ease: Elastic.easeInOut});
var tween = TweenMax.from(".promoimg", 1, {x: "-440px", Delay: 1, ease: Elastic.easeInOut});


$buttnorm.hover(
        function () {
            TweenLite.to($(this), 0.2, {scale: 1.1});
        },
        function () {
            TweenLite.to($(this), 0.2, {scale: 1});
        }
);

//TweenLite.to(".horatxt", 2, {boxShadow:"0px 0px 20px red", color:"#FC0"});



