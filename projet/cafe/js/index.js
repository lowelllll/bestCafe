 var wi = $(".cover").width();
    var he = $(".cover").height();
    var winwi = $(window).height();
    
    $("#wrap").height(winwi);
    $(".cover > img").width(wi).height(he-60);
    
$(window).resize(function(){
     var wi = $(".cover").width();
    var he = $(".cover").height();
    var winwi = $(window).height();
    
    $("#wrap").height(winwi);
    $(".cover > img").width(wi).height(he-60);

});