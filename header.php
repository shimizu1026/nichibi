<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="ja_JP" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html lang="ja_JP" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html lang="ja_JP" class="no-js ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<?php
  // All in one SEO Packを入れた場合、下記の変数を使った条件分岐を使う。
  // 使わない場合は、これに属する記述を削除する
  $seo_description = get_post_meta(get_the_ID(), '_aioseop_description', true);
  $seo_keywords = get_post_meta(get_the_ID(), '_aioseop_keywords', true);
 ?>
<?php
  // Settig All in one Seo Pack のディスクリプションの設定がされていない時に出力
  if ( empty($seo_description) && empty($post->post_content) || is_tax() || is_post_type_archive() || is_archive() ) :
?>
<meta name="Description" content="<?php bloginfo( 'description' ); ?>" />
<?php endif; ?>
<?php
  // Settig All in one Seo Pack のキーワードの設定がされていない時に出力
  if ( empty($seo_keywords) || is_tax() || is_post_type_archive() || is_archive()) :
?>
<meta name="Keywords"  content="広島,グラフィック,デザイン,ホームページ作成,制作," />
<?php endif; ?>

<title><?php if(is_home()): ?>広島のグラフィックデザイン,ITソリューションのことなら株式会社日美
<?php else: ?><?php wp_title( '|', true, 'right' ); ?><?php endif; ?></title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta property="og:locale" content="ja_JP">
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
<meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicons/screenshot_ogp.png" />
<meta property="og:site_name" content="<?php wp_title( '|', true, 'right' ); ?>" />
<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>" />
<meta name="twitter:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicons/screenshot_twitter.png" />
<meta name="twitter:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">

<?php // SEO関係のプラグインを入れなかった場合はこれを使う ?>
<link rel="canonical" href="<?php echo esc_url( home_url( '/' ) ); ?>" />

<!-- IE10以下用 -->
<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicons/favicon.ico">
<!-- For IE 11, Chrome, Firefox, Safari, Opera -->
<!-- <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicons/favicon-16.png" sizes="16x16" type="image/png">
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicons/favicon-32.png" sizes="32x32" type="image/png">
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicons/favicon-48.png" sizes="48x48" type="image/png">
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicons/favicon-62.png" sizes="62x62" type="image/png">

<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicons/apple-touch-icon.png" /> -->

<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">
<link rel="preload" as="style" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    onload="this.rel='stylesheet'">

<?php wp_deregister_script('jquery'); ?>
<?php wp_head(); ?>

<!-- Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-209883092-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-209883092-1');
  gtag('config', 'G-G7SHSNF2GG');
</script>

</head>

<body <?php body_class(); ?>>

<header role="banner" class="header">
  <div class="h-top flexbox flex-justify-between flex-align-center">
      <div class="logo flexbox flex-align-center"><span>本質を見極めてデザインで解決する。株式会社 日美</span>
      </div>
      <!-- <div class="sns">
          <div class="flexbox flex-align-center flex-justify-end">
              <span>
                  <a href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </span>
              </p>
          </div>
      </div> -->
  </div>
  <div class="h-bottom flexbox flex-justify-between flex-align-center">
      <div class="logo flexbox flex-align-center">
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/logo01.png"></a></h1>
      </div>
      <ul class="link flexbox flex-align-center">
          
          
          <div class="header_links">
              <li class="instagram"><a href="https://www.instagram.com/nichibi.official/?hl=ja" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a></li>
              <li class="peacefactory"><a href="https://www.peace-factory.net/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/common/peacefactory_logo.svg" alt=""></a></li>
              <li><a class="policy_link" href="<?php echo esc_url( home_url( '/' ) ); ?>privacypolicy/"><i class="fa fa-caret-right" aria-hidden="true"></i>プライバシーポリシー</a></li>
              <li><a class="contact_link" href="<?php echo esc_url( home_url( '/' ) ); ?>contact/"><i class="fa fa-envelope" aria-hidden="true"></i> お問い合わせ</a></li>
          </div>
      </ul>
  </div>
  <nav id="gnav" class="gnav collapse" role="navigation">
      <ul class="flexbox flex-justify-between">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>concept/">コンセプト</a></li>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>graphic/">グラフィック</a></li>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>it/">ITソリューション</a></li>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/">日美について</a></li>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>company/">会社概要</a></li>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact/">お問い合わせ</a></li>
          <li class="instagram peacefactory"><a href="https://www.peace-factory.net/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/common/peacefactory_logo.svg" alt=""></a></li>
          <li class="instagram"><a href="https://www.instagram.com/nichibi.official/?hl=ja" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a></li>
       

      </ul>
  </nav>
  <button type="button" id="toggle" class="toggle" data-toggle="collapse" data-target="#gnav" aria-controls="gnav"
      aria-expanded="false">
      <span class="toggle__bar"></span>
      <span class="toggle__title"></span>
  </button>
</header>
<a href="#">
        <div id="target"><span></span></div>
</a>