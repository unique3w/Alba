<?php
/* ======================================================================
	search.php
	Template for search results.
* ====================================================================== */
get_header(); ?>
<div id="primary" class="content-area">

		<header>
			<h1 class="text-center"><?php printf( __( 'Resultados de búsqueda: ', 'alba' ) ); ?><?php echo the_search_query(); ?></h1>
		</header>
	    <?php
	    if ( have_posts() ) : while ( have_posts() ) : the_post();
	    get_template_part( 'partials/content', get_post_format() );
	    endwhile; ?>

	<div class="pagination">
	    <?php alba_pagination(); ?>
	</div>

<?php else :
    get_template_part( 'partials/content', 'none' );
 endif; ?>
</div>
<?php get_footer(); ?>