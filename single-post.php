<?php get_header(); ?>
<div class="single-post">
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>
      <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
        </div>
      <?php endif; ?>
      <div class="single-post-right">
        <h1>
          <?php the_title(); ?>
        </h1>
        <?php if (get_field('excerpt')) : ?>
          <p class="single-excerpt"><?php the_field('excerpt'); ?></p>
        <?php endif; ?>
        <?php if (get_field('ratings')) : ?>
          <p lass="single-ratings"><?php the_field('ratings'); ?></p>
        <?php endif; ?>

        <?php if (get_field('pricing')) : ?>
          <p lass="single-pricing"><?php the_field('pricing'); ?></p>
        <?php endif; ?>
        <span class="single-detailes">Product Detailes :-</span>
        <div class="post-content">
          <?php the_content(); ?>
        </div>
        <?php if (get_field('country_of_origin')) : ?>
          <span class="single-country">Country of Origin :-</span>
          <p class="country-content"><?php the_field('country_of_origin'); ?></p>
        <?php endif;
        ?>
        <?php if (get_field('gender')) : ?>
          <p><?php the_field('gender'); ?></p>
        <?php endif;
        $brands = get_the_terms($post->ID, 'brand');
        if ($brands && !is_wp_error($brands)) {
          foreach ($brands as $brand) {
            ?>
            <span class="single-brand">Brand :-</span>
            <?php 
            echo $brand->name ;
          }
          echo '</p>';
        }
        ?>
    <?php endwhile;
  endif; ?>
      </div>
</div>
<?php get_footer(); ?>