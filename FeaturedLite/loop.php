<!-- Start the Loop. -->
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="blog-loop">
        <?php if ( 'post' == get_post_type() ) : ?>

    <div class="post-details">
      <ul class="post-meta-ul">
        <li class="author"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>
        <li class="post-date"><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
      </ul>
    </div>
      <?php endif; ?>

    <div class="post-title">
      <h1><?php the_title();?></h1>
    </div>
      <?php if ( 'post' == get_post_type() ) : ?>

    <div class="post-meta">
      <ul>
        <li class="category"><i class="fa fa-folder-open-o"></i><?php the_category(' / '); ?></li>
        <li class="comments"><a href="<?php comments_link(); ?>"><i class="fa fa-comments-o"></i><?php comments_number(__('No Comments', 'featuredlite'), __('One Comment', 'featuredlite'),  __('% Comments', 'featuredlite') ); ?></a></li>
      </ul>
    </div>
  <?php endif; ?>
    <div class="post-content">
      <a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('featuredlite-custom-thumb'); ?> </a>
      <?php the_excerpt();?>
    </div>
    <div class="read-more"><a class="read_more" href="<?php the_permalink() ?>"><?php echo _e('Read More','featuredlite'); ?></a></div>
    
  </div>
</div>
<?php
endwhile;
featuredlite_pagination();
else:?>
<div class="post-none">
  <p>
    <?php _e('sorry no post matched your criteria!', 'featuredlite'); ?>
  </p>
</div>
<?php endif; ?>
<!--End post-->