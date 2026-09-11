$(document).ready(function() {

  // ヘッダー下部線追加
 $(window).on('scroll', function () {
    $('header').toggleClass('bdr_b', $(this).scrollTop() > 300)
    $('header').fadeIn();
  });
    
// メニュー現在ページ
//     var url = window.location.pathname;
//        $('.menulist > li a[href="'+url+'"]').addClass('here');

	// メニュー現在ページ
    $('.menulist > li a').each(function(){
        var $href = $(this).attr('href');
        if(location.href.match($href)) {
        $(this).addClass('here');
        } else {
        $(this).removeClass('here');
        }
    })
    
// メニュー開閉
  $('#menu_sp').hide()
  $('#ic_menu').click(function () {
    $('#menu_sp').slideToggle('fast')
    $(this).toggleClass('active')
    return false
  })

  var over_flg = false

  // マウスカーソルの位置（メニュー上/メニュー外）
  $('#ic_menu,#menu_sp ul').hover(function () {
    over_flg = true
  }, function () {
    over_flg = false
  })

  // メニュー領域外をクリックしたらメニューを閉じる
  $('body').click(function () {
    if (over_flg === false) {
      $('#menu_sp').slideUp('fast')
      $('#ic_menu').removeClass('active')
    }
  })
  // メニューのどれかクリックしたらメニューを閉じる
  $('#menu_sp li a').click(function () {
    $('#menu_sp').slideUp('fast')
    $('#ic_menu').removeClass('active')
  })
	// スムーススクロール＋ずらす
	var headerHight = 70 //ヘッダの高さ
	$('a[href^=#]').click(function() {
		var href = $(this).attr('href')
		var target = $(href === '#' || href === '' ? 'html' : href)
		var position = target.offset().top - headerHight //ヘッダの高さ分位置をずらす
		$('html, body').animate({scrollTop: position}, 200, 'swing')
		return false
	})

	// telリンクスマホ以外無効
	var ua = navigator.userAgent.toLowerCase()
	var isMobile = /iphone/.test(ua) || /android(.+)?mobile/.test(ua)

	if(!isMobile) {
		$('a[href^="tel:"]').on('click', function(e) {
			e.preventDefault()
		})
	}


	// ページトップ
    var topBtn = $('#pagetop');   
    topBtn.hide();
    //スクロールが200に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    
  $(function () {
  $(".faq dt").on("click", function () {
    $(this).next().slideToggle('fast');
    $(this).toggleClass("active");
  });
});

  // トップページのお知らせ詳細を開閉
  var newsToggleDuration = 300;

  function toggleNewsDetail($trigger) {
    var detailId = $trigger.attr('aria-controls');
    var $detail = $('#' + detailId);
    var $detailInner = $detail.find('.news-table__detail-inner');
    var $triggers = $('.news-detail-trigger[aria-controls="' + detailId + '"]');
    var isOpen = $trigger.attr('aria-expanded') === 'true';

    $triggers
      .attr('aria-expanded', String(!isOpen))
      .toggleClass('is-open', !isOpen);
    $triggers.filter('.news-toggle')
      .attr('aria-label', isOpen ? '詳細を表示' : '詳細を閉じる');

    if (isOpen) {
      $detailInner.stop(true, true).slideUp(newsToggleDuration, function () {
        $detail.prop('hidden', true).css('display', '');
        $detailInner.css('display', '');
      });
    } else {
      $detail
        .prop('hidden', false);
      $detailInner
        .stop(true, true)
        .hide()
        .slideDown(newsToggleDuration);
    }
  }

  $('.news-detail-trigger').on('click', function () {
    toggleNewsDetail($(this));
  });

  $('.news-detail-trigger[role="button"]').on('keydown', function (event) {
    if (event.key === 'Enter' || event.key === ' ') {
      event.preventDefault();
      toggleNewsDetail($(this));
    }
  });
    
})
