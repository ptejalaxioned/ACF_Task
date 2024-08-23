<?php get_header(); ?>
<div class="posts-page">
  <div class="posts">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'paged' => $paged,  // Add this line to support pagination
      'meta_query' => array(
        array(
          'key' => 'gender',
          'value' => 'male'
        )
      )
    );
    $all_posts = new WP_Query($args);
    if ($all_posts->have_posts()) :
      while ($all_posts->have_posts()) : $all_posts->the_post();
    ?>
        <div class="post">
          <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
            </div>
          <?php endif; ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php if (get_field('excerpt')) : ?>
            <p><?php the_field('excerpt'); ?></p>
          <?php endif; ?>
          <?php if (get_field('pricing')) : ?>
            <p><?php the_field('pricing'); ?></p>
          <?php endif; ?>
          <?php if (get_field('ratings')) : ?>
            <p><?php the_field('ratings'); ?></p>
          <?php endif; ?>
        </div>
      <?php
      endwhile;
      ?>
  </div>
  <!-- Pagination -->
  <div class="pagination">
    <?php
      echo paginate_links(array(
        'total' => $all_posts->max_num_pages,
        'current' => $paged,
        'prev_text' => __('« Previous', 'textdomain'),
        'next_text' => __('Next »', 'textdomain'),
      ));
    ?>
  <?php
      wp_reset_postdata();
else :
      echo '<p>No posts found.</p>';
    endif;
  ?>
  </div>
</div>

<?php get_footer(); ?>