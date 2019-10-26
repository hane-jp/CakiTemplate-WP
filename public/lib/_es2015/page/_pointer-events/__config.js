export default function () {

  console.log('pointerEventsPage');

  if (Modernizr.pointerevents) {
    // supported
    var caniuse = 'つかえるよ';
  } else {
    // not-supported
    var caniuse = 'つかえないよ';
  }

  $('#caniuse').text(caniuse);

  //-------------------------------

  $('#caniuse_polyfill').on('pointerdown',function(){
    $(this).text('つかえるよ');
  })

  //

  $('#enter-test').css({
    'background':'red',
  });

  $('#enter-test').on('pointerenter',function(){
    $(this).css({
      'background':'blue'
    });
  });

  $('#enter-test').on('pointerleave',function(){
    $(this).css({
      'background':'yellow'
    });
  });

  //----a/labelタグ

  $('.enter-test-anchor').attr('touch-action', 'pan-y');

  $('.enter-test-anchor').on('pointerenter',function(){
    $(this).css({
      'background':'blue'
    });
  });

  $('.enter-test-anchor').on('pointerleave',function(){
    $(this).css({
      'background':'yellow'
    });
  });


};
