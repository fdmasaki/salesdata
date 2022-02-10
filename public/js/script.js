'use strict';
{
  const open = document.getElementById('signin');
  const close = document.getElementById('sns');
  const modal = document.getElementById('modal');
  const mask = document.getElementById('mask');

  open.addEventListener('click', function () {
    modal.classList.remove('hidden');
    mask.classList.remove('hidden');
  });
  close.addEventListener('click', function () {
    modal.classList.add('hidden');
    mask.classList.add('hidden');
  });
  mask.addEventListener('click', function () {
    modal.classList.add('hidden');
    mask.classList.add('hidden');
  });
}

//参照　https://coco-factory.jp/ugokuweb/move01/5-1-5/
if(document.URL.match(/index/)){
  function FixedAnime(){
    var headerH =$('header').outerHeight(true);
    var scroll =$(window).scrollTop();
    if(scroll>=headerH){
      $('header').addClass('fixed');
    }else {
      $('header').removeClass('fixed');
    }
  };
  $(window).scroll(function(){
    FixedAnime();
  });
  }



  $(function(){
    $('#btn').on('click', function (){
    if ($('#name').val()=== '' || $('#name').val().length >11){
      alert('氏名は必須入力です。10文字以内でご入力ください。');
    }
    if ($('#kana').val()=== '' || $('#kana').val().length >11){
      alert('フリガナは必須入力です。10文字以内でご入力ください。');
    }
    if (!$('#tel').val().match(/^[0-9]*$/)){//数字で始まり、２文字目も数字で、最後まで数字
      alert('電話番号は0-9の数字のみでご入力ください。');
    }
    if ($('#email').val()=== '' || !$('#email').val().match(/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/)){
      //メアドの正規表現
      alert('メールアドレスは正しくご入力ください。');
    }
    if($('#body').val()=== ''){
      alert('お問い合わせ内容は必須入力です。');
    }
    if(error){
      alert(error);
      return false;
    }
      return true;
    });
  });

$(function ScrollTop(){
  var btn=$('.jump');
  btn.hide();
  $(window).scroll(function(){
    if($(window).scrollTop()>300){
      btn.fadeIn();
    }else{
      btn.fadeOut();
    }
  });
  btn.click(function(){
    $('body,html').animate({
      scrollTop:0
    }, 500);
    return false;
  });
});

//参照　https://125naroom.com/web/2899
$(function(){
  $('a[href^="#"]').click(function(){
    var speed=400;
    var href=$(this).attr("href");
    var target=$(href=="#" || href == "" ? 'html' :href);
    var position=target.offset().top;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
});
