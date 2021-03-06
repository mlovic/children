<?php 

$page_id = get_queried_object_id('page_id');

?>

<?php get_header(); ?>

<div class="slide">
  <?php 
  // Code to display slideshow (plugin)
  // if (function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } 
  ?>
  <?php $page_id = get_queried_object_id(); ?>
  <?php echo get_the_post_thumbnail( $page_id ); ?>
</div>
<div class="body">
	<div class="grid">
		<div class="row">
			<div class="slot-0-1-2">
				<iframe src="<?php echo get_post_meta($page_id, 'video_url', true); ?>" frameborder="0" allowfullscreen></iframe>

        <?php //TODO write function to DRY up ?>

			</div>
			<div class="slot-3-4-5">
				<h2>
          <?php echo get_post_meta($page_id, 'statement_header', true); ?>
				</h2>
				<div class="info">
					<h3>
            <?php echo get_post_meta($page_id, 'statement', true); ?>
					</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="slot-6-7-8">
				<h2>
          <?php echo get_post_meta($page_id, 'blog_header', true); ?>
				</h2>
				<div class="blog">
          <?php 
            $category = $post->post_name; // Slug
            $list_of_posts = new WP_Query( "category_name={$category}");
            if ( $list_of_posts->have_posts() ) : 
              while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post();
          ?>

                <h1>
                  <?php the_title(); ?>
                </h1>
                <p>
                  <?php the_content(); ?>
                </p>

          <?php 
              endwhile;
            else : 
              get_template_part( 'content', 'none' );
              echo 'No posts yet';
            endif;
          ?>
				</div>
			</div>
      <?php get_sidebar(); // Tweets ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
