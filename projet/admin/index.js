var height = $(window).height();

$("#wrap").height(height);

$(".menu li").on("click",function(){
   // $(".allow").fadeIn();
  $(this).addClass("focusList");
   $(this).siblings().removeClass("focusList");
})
$(".menu li").eq(0).on("click",function (){

    $(".member").css("display","block");
    $(".allow , .design , .close ,.category").css("display","none");
})
$(".menu li").eq(1).on("click",function (){

    $(".allow").css("display","block");
    $(".member , .design , .close ,.category").css("display","none");
})
$(".menu li").eq(2).on("click",function (){

    $(".design").css("display","block");
    $(".allow , .member , .close,.category").css("display","none");
})
$(".menu li").eq(3).on("click",function (){

    $(".category").css("display","block");
    $(".allow , .design , .member , .close").css("display","none");
})
$(".menu li").eq(4).on("click",function (){

    $(".close").css("display","block");
    $(".allow , .design , .member , .category").css("display","none");
})