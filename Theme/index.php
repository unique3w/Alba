<?php
/* ======================================================================
index.php
Template for page that displays all of your posts.
* ====================================================================== */
get_header(); ?>

<div id="primary" class="content-area clearfix">

	    <?php
	    if ( have_posts() ) : while ( have_posts() ) : the_post();
	    get_template_part( 'partials/content', get_post_format() );
	    endwhile;
?>

	<div class="pagination">
	    <?php alba_pagination(); ?>
	</div>

<?php else :
    get_template_part( 'partials/content', 'none' );
 endif; ?>

</div>
<?php get_footer(); ?>