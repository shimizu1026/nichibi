<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

<main role="main" class="main">
  <div class="breadcrumbs">
      <div class="s-container">
          <ol typeof="BreadcrumbList" vocab="http://schema.org/">
              <!-- Breadcrumb NavXT 5.7.1 -->
              <li class="home"><span property="itemListElement" typeof="ListItem"><a property="item"
                          typeof="WebPage" title="" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home"><span property="name"><i
                                  class="fa fa-home" aria-hidden="true"></i></span></a>
                      <meta property="position" content="1">
                  </span>
              </li>
              <li class="current_item"><span property="itemListElement" typeof="ListItem"><span
                          property="name">ニュース &amp; ブログ</span>
                      <meta property="position" content="2">
                  </span>
              </li>
          </ol>
      </div>
  </div>
  <div class="under-visual is-news-blog">
      <div class="inner">
          <h3 class="heading01"><span class="heading-big">N</span>EWS<span class="heading-small">&amp;</span><span
                  class="heading-big">B</span>LOG<br><span>ニュース &amp; ブログ</span></h3>
      </div>
  </div>
  <div class="container">
  </div>

  <div class="col02">
      <div class="main">
          <ul class="archive-category flexbox">
              <li class="current"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/news/">すべて</a></li>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/news/">News</a></li>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/blog/">Blog</a></li>
          </ul>

          <section class="work01">
              <ul class="flexbox flex-wrap">
                  <?php
                  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                  $args = array(
                      'posts_per_page' => 15,//記事の数
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

                  <li><a href="<?php the_permalink(); ?>">
                      <?php if(has_post_thumbnail()): ?>
                          <?php the_post_thumbnail( array( 300, 300 ) ); ?>
                      <?php else: ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/img/news-blog/img01.jpg">
                      <?php endif; ?>
                      <p><span><?php echo $cat_name; ?></span><?php the_time('Y.m.d') ?></p>
                      <h3><?php the_title(); ?></h3>
                  </a></li>

                  <?php endwhile; else:?>
                  <p>ただいま記事がございません。</p>
                  <?php endif; ?>
                  
              </ul>
              <div class="center">
                  <?php if(function_exists('wp_pagenavi')){
                      wp_pagenavi(array('query'=>$the_query)); }?>
                  <?php wp_reset_postdata(); ?>
              </div>
          </section>
      </div>

      <div class="side">
          <ul class="category">
              <li class="current"><a href="<?php echo esc_url( home_url( '/' ) ); ?>news/">すべて</a></li>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/news/">News</a></li>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/blog/">Blog</a></li>
          </ul>

          <div class="center mb-20">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/archive.png">
          </div>
          <ul class="archive">
            <?php wp_get_archives(); ?>
          </ul>
      </div>
  </div>

  </main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
