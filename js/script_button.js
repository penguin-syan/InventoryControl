$(function(){
    var topBtn=$('#pageTop');
    topBtn.hide();

//◇ボタンの表示設定
$(window).scroll(function(){
      if($(this).scrollTop()>80){
        topBtn.fadeIn();
      }else{
        topBtn.fadeOut();
    } 
});

// ◇ボタンをクリックしたら、スクロールして上に戻る
topBtn.click(function(){
      $('body,html').animate({
          scrollTop: 0},500);
          return false;
    });
});