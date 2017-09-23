var he = $(window).height();
$("#wrap").height(he);

$(window).resize(function(){
    var he = $(window).height();
    $("#wrap").height(he);

});

$(".out").on("click",function () {
    history.back();
});

