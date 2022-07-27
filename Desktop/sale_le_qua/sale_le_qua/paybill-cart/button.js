$(".but").click (function(){
    // Close all open windows
    $(".content1").stop().slideUp(300); 
    // Toggle this window open/close
    $(this).next(".content1").stop().slideToggle(300);
    //hitter test// 
  });
  

  