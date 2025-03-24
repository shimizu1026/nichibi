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

              <li><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title=""
                          href="<?php echo esc_url( home_url( '/' ) ); ?>news/" \><span property="name">ニュース</span></a>
                      <meta property="position" content="2">
                  </span>
              </li>

              <li class="current_item"><span property="itemListElement" typeof="ListItem"><span
                          property="name"><?php the_title(); ?></span>
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

  <div class="col02">
      <div class="main">
          <section class="land01-detail detail">
              <p class="ymd"><span>
                    <!-- <//?php if(is_category('news')) : ?> -->
                      <?php $cat = get_the_category(); ?>
                      <?php $cat = $cat[0]; ?>
                      <!-- <//?php echo get_cat_name($cat->term_id); ?> -->
                      <?php echo $cat->name; ?>
                    <!-- <//?php else: ?>
                      <//?php
                      $tag = get_the_tags();
                      var_dump($tag);
                      echo $tag[0]->name;
                      ?> -->
                    <!-- <//?php endif; ?> -->
              </span><?php the_time('Y.m.d') ?></p>
              <h3><?php the_title(); ?></h3>

              <div class="content a-deco">
                  <?php the_content(); ?>
              </div>


              <div class="center pager-wrap">
                <?php // 現在の投稿に隣接している前後の投稿を取得する
                  $prev_post = get_previous_post(); // 前の投稿を取得
                  $next_post = get_next_post(); // 次の投稿を取得
                  if( $prev_post || $next_post ): // どちらか一方があれば表示
                ?>
                  <div class="pager flex-justify-between clearfix">
                      <span class="previous">
                        <?php if( $next_post ): // 次の投稿があれば表示 ?>
                          <a href="<?php echo get_permalink( $next_post->ID ); ?>">前の記事</a>
                        <?php endif; ?>
                      </span>
                      <span class="back"><a href="#" onclick="history.back(); return false;">一覧にもどる</a></span>
                      <span class="next">
                        <?php if( $prev_post ): // 前の投稿があれば表示 ?>
                          <a href="<?php echo get_permalink( $prev_post->ID ); ?>">次の記事</a>
                        <?php endif; ?>
                      </span>
                  </div>
                  <?php endif; ?>
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
