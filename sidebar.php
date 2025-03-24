<div class="secondary" role="complementary">
  <?php
   $args = array(
    'posts_per_page' => 5
  );
    $sideposts = new WP_Query( $args ) ;
      while ( $sideposts->have_posts() ) :
        $sideposts->the_post();
  ?>
  <?php
    endwhile;
      wp_reset_postdata();
  ?>

  <?php if ( is_active_sidebar( 'sidebar-1' ) ) { dynamic_sidebar( 'sidebar-1' ); } ?>
  <?php if ( is_active_sidebar( 'sidebar-2' ) ) { dynamic_sidebar( 'sidebar-2' ); } ?>

</div>