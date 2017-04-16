<?php
/* ======================================================================
    content-none.php
    Template for showing when no content in page is found
 * ====================================================================== */
?>

<div class="post-inner hentry no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nada encontrado', 'alba' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Preparado para publicar tú primer post? <a href="%1$s">Empieza aquí</a>.', 'alba' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Lo sentimos nada coincide con tú criterio. Inténtalo de nuevo con una nueva palabra.', 'alba' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'alba' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->
</div><!-- .no-results -->
