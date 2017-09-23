var he = $(window).height();
var wi = $(window).width();
var logohe = $(".logo").width();
var facewi = $(".face").width();
$("#wrap , #wrap2").height(he);
$(".logo").height(logohe);
$(".face").height(facewi);
$(".face img").width(facewi).height(facewi);

$(window).resize(function(){
    
    var he = $(window).height();
    var wi = $(window).width();
    var logohe = $(".logo").width();
    var facewi = $(".face").width();
    $("#wrap , #wrap2").height(he);
    $(".logo").height(logohe);
    $(".face").height(facewi);
    $(".face img").width(facewi).height(facewi);
    
});

$("input").focus(function(){
    $(this).val("");
});