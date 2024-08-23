<?php get_header(); ?>
<div class="posts">
  <?php
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
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
    wp_reset_postdata();
else :
    echo '<p>No posts found.</p>';
  endif;
  ?>
</div>
<?php get_footer(); ?>