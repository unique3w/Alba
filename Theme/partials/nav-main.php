<?php
/* ======================================================================
	nav-main.php
	Template for site navigation
 * ====================================================================== */
?>

<nav id="access">
	<?php if ( has_nav_menu( 'main-nav' ) ) {
		alba_main_nav();
	} else { ?>
		<ul class="navbar float-left">
			<li><a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php esc_html_e( 'Añadir a menú', 'alba' ); ?></a>
			</li>
		</ul>
	<?php } ?>
</nav>