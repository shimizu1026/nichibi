<?php get_header(); ?>

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
            <li class=""><a href="<?php echo esc_url( home_url( '/' ) ); ?>/news/">すべて</a></li>
            <li class="<?php if(is_category('news')) echo 'current'; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/news/">News</a></li>
            <li class="<?php if(is_category('blog')) echo 'current'; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/blog/">Blog</a></li>
        </ul>

        <section class="work01">
            <ul class="flexbox flex-wrap">
                <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

                <li><a href="<?php the_permalink(); ?>">
                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail( array( 300, 300 ) ); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/news-blog/img01.jpg">
                    <?php endif; ?>
                    <p><span>
                      <?php $cat = get_the_category(); ?>
                      <?php $cat = $cat[0]; ?>
                      <?php echo $cat->name; ?>                  
                    </span><?php the_time('Y.m.d') ?></p>
                    <h3><?php the_title(); ?></h3>
                </a></li>

                <?php endwhile; else:?>
                <p>ただいま記事がございません。</p>
                <?php endif; ?>
                
            </ul>
            <div class="center">
                <?php wp_pagenavi(); ?>
            </div>
        </section>
    </div>

    <div class="side">
        <ul class="category">
            <li class="current"><a href="<?php echo esc_url( home_url( '/' ) ); ?>news/">すべて</a></li>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/news/">News</a></li>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/blog/">Blog</a></li>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/peacefactory/">Peace Factoryの活動</a></li>
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
<?php get_footer(); ?>
