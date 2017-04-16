<?php
/* ======================================================================
	404.php
	Template for 404 error page.
* ====================================================================== */
get_header(); ?>
<div id="primary" class="content-area text-center" role="main">
		<article>
			<header>
				<h1><?php _e( 'Error 404 Página no encontrada', 'alba' ); ?></h1>
			</header>
			<p><?php _e( 'Lo sentimos no podemos encontrar esta página.', 'alba' ); ?></p>
			<?php get_search_form(); ?>
		</article>
</div>
<?php get_footer(); ?>