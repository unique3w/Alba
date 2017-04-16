<?php
/* ======================================================================
Single.php
Template for individual blog posts.
* ====================================================================== */
get_header();

?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="primary" class="content-area">
		<?php
		 	get_template_part( 'partials/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || '0' != get_comments_number() ) {
				comments_template();
			}
		 ?>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>