/* 
/*victor reyes js
 */
var mainrr = document.querySelector(".menu_main_redrock");

var footerme = document.querySelector(".footer");

window.onresize = function() {
if ($("#mainrr").height() > $(window).height()) {
  // Overflow detected; force scroll bar
  mainrr.style.position= "static";
 //mainrr.style.overflow = "scrollbar";
   mainrr.style.transform = "translateY(0)";
     mainrr.style.width= "100%";
   mainrr.style.top= "0px";
console.log("axaxaxaxa");
  
  footerme.style.position="relative";
  
  
} else {
    console.log("ololololol");
  footerme.style.position="absolute";
        
        mainrr.style.position= "absolute";
 mainrr.style.overflow = "hidden";
   mainrr.style.transform = "translateY(-50%)";
    mainrr.style.width= "100%";
   mainrr.style.top= "50%";
}
};


var $hora=$('#horaid');

var horatxt=$('#horatxtid');

$hora.hover(
        function(){
            TweenLite.to($(this),0.2,{scale:1.2});
        },
        function(){
            TweenLite.to($(this),0.2,{scale:1});
        }
);

var tween = TweenMax.from(".horatxt", 1, {x:"300px", Delay:0.5, ease:Elastic.easeInOut});
var tween = TweenMax.from(".hora", 1, {x:"-300px", Delay:1, ease:Elastic.easeInOut});

//TweenLite.to(".horatxt", 2, {boxShadow:"0px 0px 20px red", color:"#FC0"});



