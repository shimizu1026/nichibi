<?php get_header(); ?>
<main role="main" class="main">
  <div class="home-slide-wrap mb-110">
      <div class="home-slide">
          <div>
              <picture>
                  <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/top/top_sp.jpg" media="(max-width: 768px)">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/top/slide_top_sp.jpg">
              </picture>
          </div>
          <div>
              <picture>
                  <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/top/top_sp2.jpg" media="(max-width: 768px)">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/top/slide_top_sp2.jpg">
              </picture>
          </div>
          <div>
              <picture>
                  <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/top/top_sp.jpg" media="(max-width: 768px)">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/top/slide_top_sp.jpg">
              </picture>
          </div>
          <div>
              <picture>
                  <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/img/top/top_sp2.jpg" media="(max-width: 768px)">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/top/slide_top_sp2.jpg">
              </picture>
          </div>
      </div>
  </div>
  <section class="home03">
      <h3 class="heading01"><span class="heading-big">N</span>EWS<span class="heading-small">&amp;</span><span
              class="heading-big">B</span>LOG<br><span>ニュース &amp; ブログ</span></h3>
      <div class="flexbox">
          <div class="wrap">
              <div>
                  <h4><span class="cat-big">N</span>EWS</h4>
                  <ul>
                    <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $args = array(
                        'category_name' => 'news',//カテゴリー
                        'posts_per_page' => 2,//記事の数
                        'paged' => $paged,
                        'post_type' => array(
                            'post',
                        ),
                    );
                    $the_query = new WP_Query($args);?>
                    <?php if($the_query->have_posts()): ?>
                    <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php
                      $cat = get_the_category();
                      $cat_slug = $cat[0]->slug;
                      $cat_name = $cat[0]->name;
                    ?>

                    <li class="flexbox">
                        <div class="photo">
                          <?php if(has_post_thumbnail()): ?>
                              <?php the_post_thumbnail( array( 85, 85 ) ); ?>
                          <?php else: ?>
                              <img src="<?php echo get_template_directory_uri(); ?>/img/top/noimage.jpg">
                          <?php endif; ?>
                        </div>
                        <div class="text">
                            <?php if(get_field('pdf')): ?>
                            <a href="<?php the_field('pdf'); ?>" target="_blank" rel="noopener noreferrer"><p><span class="news-cat"><?php echo $cat_name; ?></span>
                                  <time datetime="2021-10-01"><?php the_time('Y.m.d') ?></time>
                                </p>
                                <h5><?php the_title(); ?></h5></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>">
                                <p><span class="news-cat"><?php echo $cat_name; ?></span>
                                  <time datetime="2021-10-01"><?php the_time('Y.m.d') ?></time>
                                </p>
                                <h5><?php the_title(); ?></h5>
                            </a>
                            <?php endif; ?>
                        </div>
                    </li>

                    <?php endwhile; else:?>
                    <p>ただいま記事がございません。</p>
                    <?php endif; ?>
                      
                  </ul>
                  <a class="btn01" href="<?php echo esc_url( home_url( '/' ) ); ?>news/">一覧を見る</a>
              </div>
          </div>
          <div class="wrap">
              <div>
                  <h4><span class="cat-big">B</span>LOG</h4>
                  <ul>
                      <?php
                      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                      $args = array(
                          'category_name' => 'blog',//カテゴリー
                          'posts_per_page' => 2,//記事の数
                          'paged' => $paged,
                          'post_type' => array(
                              'post',
                          ),
                      );
                      $the_query = new WP_Query($args);?>
                      <?php if($the_query->have_posts()): ?>
                      <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
                      <?php
                        $cat = get_the_category();
                        $cat_slug = $cat[0]->slug;
                        $cat_name = $cat[0]->name;
                      ?>

                      <li class="flexbox">
                          <div class="photo">
                            <?php if(has_post_thumbnail()): ?>
                                <?php the_post_thumbnail( array( 85, 85 ) ); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/top/noimage.jpg">
                            <?php endif; ?>
                          </div>
                          <div class="text">
                              <a href="<?php the_permalink(); ?>">
                                  <p><span class="news-cat"><?php echo $cat_name; ?></span>
                                    <time datetime="2021-10-01"><?php the_time('Y.m.d') ?></time>
                                  </p>
                                  <h5><?php the_title(); ?></h5>
                              </a>
                          </div>
                      </li>

                      <?php endwhile; else:?>
                      <p>ただいま記事がございません。</p>
                      <?php endif; ?>
                  </ul>
                  <a class="btn01" href="<?php echo esc_url( home_url( '/' ) ); ?>/category/blog/">一覧を見る</a>
              </div>
          </div>
      </div>
  </section>
</main>
<div class="modelhouse">
  <h2 class="heading01"><span class="heading-big">A</span>BOUT <span
          class="heading-big">U</span>S<br><span>私たちについて</span></h2>
  <ul class="house-list clearfix">
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>concept/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/category01.jpg"><span>コンセプト</span></a></li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/category02.jpg"><span>日美について</span></a></li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>it/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/category03.jpg"><span>ITソリューション</span></a></li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>graphic/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/category04.jpg"><span>グラフィック</span></a></li>
  </ul>
</div>
<div class="pf-banner">
  <a href="/peacefactory">
   <picture>
    <source srcset="img/peacefactory/pf-banner.jpg" media="(min-width: 640px)">
    <img src="img/peacefactory/pf-banner-sp.jpg" alt="PeaceFactory 社会貢献を目的とした新しい事業です" width="1200" height="160" decoding="async" loading="lazy"></picture>
  </a></div>
<?php get_footer(); ?>