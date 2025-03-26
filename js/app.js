(function ($) {
  if ($(".home-slide").length) {
    $(".home-slide").slick({
      autoplay: true,//追加
      fade: true,    // fedeオン
      speed: 1500,   // 画像切り替えにかかる時間（ミリ秒）
      autoplaySpeed: 0,   // 自動スライド切り替え速度
      arrows: false,
      dots: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            dots: false,
          }
        }]
    });
  }
})(jQuery);

(function ($) {
  if ($(".land-detail-slide").length) {
    $(".land-detail-slide").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      asNavFor: '.land-detail-slide-nav'
    });
  }
  if ($(".land-detail-slide-nav").length) {
    $(".land-detail-slide-nav").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.land-detail-slide',
      arrows: false,
      focusOnSelect: true,
      responsive: [ //レスポンシブの設定
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 500,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },

      ]
    });
  }
})(jQuery);

$(document).click(function () { $('#menu > li > ul').slideUp() });
$('#menu > li').click(function (ev) {
  var sub = $(this).children('ul');
  if ($(sub).is(':hidden')) {
    ev.stopPropagation();
    $('#menu > li > ul:visible').slideUp();
    $(sub).slideDown();
  }
});

$(function () {
  $('a[href^=#]').click(function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
});


document.addEventListener('DOMContentLoaded', function() {
  // 全てのカルーセルコンテナを取得
  const carousels = document.querySelectorAll('.image-carousel');
  
  // 各カルーセルに対して自動切り替え機能を設定
  carousels.forEach(carousel => {
	const images = carousel.querySelectorAll('.carousel-image');
	let currentIndex = 0;
	
	// ランダムな初期待機時間（1000ms~5000ms）を設定
	const initialDelay = Math.floor(Math.random() * 2000) + 1000;
	
	// 画像切り替え関数
	const rotateImages = () => {
	  // 次の画像インデックスを計算
	  const nextIndex = (currentIndex + 1) % images.length;
	  
	  // 前の画像はactiveのまま
	  // 次の画像を左から徐々に表示
	  images[nextIndex].classList.remove('active');
	  images[nextIndex].classList.add('next');
	  
	  // アニメーション完了後に状態を更新
	  setTimeout(() => {
		// 現在の画像のアクティブ状態を解除
		images[currentIndex].classList.remove('active');
		
		// 次の画像をアクティブに設定
		images[nextIndex].classList.remove('next');
		images[nextIndex].classList.add('active');
		
		// 現在のインデックスを更新
		currentIndex = nextIndex;
		
		// 次の切り替えをランダムな時間後（2000ms~6000ms）に設定
		const nextDelay = Math.floor(Math.random() * 4000) + 2000;
		setTimeout(rotateImages, nextDelay);
	  }, 1200); // アニメーション時間
	};
	
	// 初期遅延後に最初の切り替えを開始
	setTimeout(rotateImages, initialDelay);
  });
});

// peacefactoryページ「PeaceFactoryとは」のボタン開閉
document.addEventListener('DOMContentLoaded', function() {
	const button = document.querySelector('.button');
	const hideTextContent = document.querySelector('.hide_text_content');
	
	// 初期状態の設定（高さとopacityで制御）
	hideTextContent.style.maxHeight = '0';
	hideTextContent.style.opacity = '0';
	hideTextContent.style.overflow = 'hidden'; // コンテンツがはみ出ないように
	
	button.addEventListener('click', function() {
	  const buttonSpan = button.querySelector('span');
	  
	  if (hideTextContent.style.maxHeight === '0px' || hideTextContent.style.maxHeight === '') {
		// まずボタンの見た目を変更
		buttonSpan.textContent = '閉じる';
		button.classList.add('active');
		buttonSpan.classList.add('open'); 
		
		// 少し遅れてからコンテンツを表示する
		setTimeout(function() {
		  hideTextContent.style.display = 'block'; // まず表示させる
		  
		  // 次のフレームで高さとopacityを変更（これが重要）
		  requestAnimationFrame(function() {
			hideTextContent.style.maxHeight = hideTextContent.scrollHeight + 'px';
			hideTextContent.style.opacity = '1';
		  });
		}, 200); // 遅延
	  } else {
		// コンテンツを非表示にする
		hideTextContent.style.maxHeight = '0';
		hideTextContent.style.opacity = '0';
		
		// トランジション終了後に完全に非表示にする
		setTimeout(function() {
		  hideTextContent.style.display = 'none';
		  buttonSpan.textContent = 'PeaceFactoryの思い';
		  buttonSpan.classList.remove('open'); 
		  button.classList.remove('active');
		}, 500); // トランジションの時間より長めに設定
	  }
	});
  });

// peacefactoryページ冒頭のテキスト
 // ページ読み込み後に要素を徐々に鮮明にする
 window.addEventListener('load', () => {
	const logo = document.getElementById('logo');
	const blurText = document.querySelector('.blur');

	// ●秒後にロゴを鮮明に
	setTimeout(() => {
		logo.classList.add('reveal');
	}, 500);

	// ●秒後にテキストを鮮明に
	setTimeout(() => {
		blurText.classList.add('reveal');
	}, 1500);
});

function revealTextWithClip(elementId) {
	const container = document.getElementById(elementId);
	const clipArea = container.querySelector('.text-clip');
	const text = "クリップされた領域から文字が出てくるアニメーション";
	
	// 文字を追加
	text.split('').forEach((char, index) => {
		const charSpan = document.createElement('span');
		charSpan.textContent = char;
		charSpan.classList.add('text-char');
		
		// 遅延にイージング効果を追加
		const delay = Math.pow(index / text.length, 2) * 2;
		charSpan.style.animationDelay = `${delay}s`;
		charSpan.style.animationDuration = '0.8s';
		
		clipArea.appendChild(charSpan);
	});

	// アニメーション開始のトリガー
	setTimeout(() => {
		container.classList.add('animate-reveal');
	}, 300);
}

// ページ読み込み時に実行
document.addEventListener('DOMContentLoaded', () => {
	revealTextWithClip('textReveal');
});

function revealTextWithClip(element, text) {
	const clipArea = element.querySelector('.text-clip');
	clipArea.innerHTML = ''; // 既存の内容をクリア
	
	// 文字を追加
	text.split('').forEach((char, index) => {
		const charSpan = document.createElement('span');
		charSpan.textContent = char;
		charSpan.classList.add('text-char');
		
		// 遅延にイージング効果を追加
		const delay = Math.pow(index / text.length, 2) * 2;
		charSpan.style.animationDelay = `${delay}s`;
		charSpan.style.animationDuration = '0.8s';
		
		clipArea.appendChild(charSpan);
	});
}

// ページ読み込み時に実行
document.addEventListener('DOMContentLoaded', () => {
	const revealElements = document.querySelectorAll('.text-reveal');

	// Intersection Observerを使用して、要素が画面に入ったら
	const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting && !entry.target.classList.contains('animate-reveal')) {
				const clipArea = entry.target.querySelector('.text-clip');
				const text = clipArea.textContent;
				
				// テキストをスパンに分解
				clipArea.innerHTML = '';
				text.split('').forEach((char, index) => {
					const charSpan = document.createElement('span');
					charSpan.textContent = char;
					charSpan.classList.add('text-char');
					
					// 遅延にイージング効果を追加
					const delay = Math.pow(index / text.length, 2) * 2;
					charSpan.style.animationDelay = `${delay}s`;
					charSpan.style.animationDuration = '0.4s';
					
					clipArea.appendChild(charSpan);
				});
				
				// アニメーション開始のトリガー
				setTimeout(() => {
					entry.target.classList.add('animate-reveal');
				}, 300);

				// 一度実行したら監視を解除
				observer.unobserve(entry.target);
			}
		});
	}, {
		threshold: 0.1 // 10%が表示されたら発火
	});

	// 全ての.text-reveal要素を監視
	revealElements.forEach(el => observer.observe(el));
});

document.addEventListener("DOMContentLoaded", (event) => {
	gsap.registerPlugin(ScrollTrigger)
// ふわふわアニメーションの設定
document.querySelectorAll('.float-up').forEach(item => {
	gsap.fromTo(item, 
		{
			opacity: 0,
			y: 30  // 初期位置を50px下に
		},
		{
			opacity: 1,
			y: 0,  // 元の位置に戻す
			duration: 1,
			ease: 'power2.out',
			scrollTrigger: {
				trigger: item,
				start: 'top 80%',  // 要素の上部が画面の80%の位置に来たら
				toggleActions: 'play none none reverse'
			}
		}
	);
});

document.querySelectorAll('.slide-in-left');
// 左側の要素のアニメーション
gsap.utils.toArray('.left-item').forEach(item => {
	gsap.fromTo(item, 
		{
			opacity: 0,
			x: -100  // 左から100px外側から開始
		},
		{
			opacity: 1,
			x: 0,  // 中央に移動
			duration: 1,
			ease: 'power2.out',
			scrollTrigger: {
				trigger: item,
				start: 'top 80%',  // 要素の上部が画面の80%の位置に来たら
				toggleActions: 'play none none reverse'
			}
		}
	);
});
 // 右側の要素のアニメーション
 gsap.utils.toArray('.right-item').forEach(item => {
	gsap.fromTo(item, 
		{
			opacity: 0,
			x: 100  // 右から100px外側から開始
		},
		{
			opacity: 1,
			x: 0,  // 中央に移動
			duration: 1,
			ease: 'power2.out',
			scrollTrigger: {
				trigger: item,
				start: 'top 80%',  // 要素の上部が画面の80%の位置に来たら
				toggleActions: 'play none none reverse'
			}
		}
	);
});
   });
  

