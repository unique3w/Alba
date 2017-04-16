<?php
/* ======================================================================
footer.php
Template for footer content.
* ====================================================================== */
?>

<footer id="footer">
<?php get_sidebar(); ?>
<div class="alba-btt text-center"><a href="#"><i class="icons ion-android-arrow-dropup"></i></a></div>
<div class="colophon text-center">
	<?php printf( esc_html__( '&copy; %2$s %1$s', 'alba' ), esc_html( get_bloginfo( 'name' ) ), esc_html( date( 'Y' ) ) ); ?>
	<?php if ( ! get_theme_mod( 'alba_hide_credits' ) ) : ?>
		<span class="site-credit"> &mdash;
			<?php printf( wp_kses( __( '%2$s by <a href="%1$s">%3$s</a>', 'alba' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( __( 'http://wpvita.com', 'alba' ) ), 'Alba WordPress Theme', 'WPvita' ); ?>
		</span>
	<?php endif; ?>
</div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>