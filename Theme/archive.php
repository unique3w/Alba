<?php

/* ======================================================================
	archive.php
	Template for posts by category, tag, author, date, etc.
 * ====================================================================== */

get_header(); ?>
    <div id="primary" class="primary">
    <?php if (have_posts()) : ?>
        <header>
        <h1 class="post-title space-top space-bottom text-center">
            <?php /* If this is a category archive */ if (is_category()) { ?>
                <?php _e( 'Categoría:', 'alba' ); ?> <?php single_cat_title(); ?>

            <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                <?php _e( 'Tag:', 'alba' ); ?> <?php single_tag_title(); ?>

            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                <?php _e( 'Archivos diarios:', 'alba' ); ?> <?php echo get_the_date('F jS, Y'); ?>

            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                <?php _e( 'Archivos mensuales:', 'alba' ); ?> <?php echo get_the_date('F, Y'); ?>

            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                <?php _e( 'Archivos anuales:', 'alba' ); ?> <?php echo get_the_date('Y'); ?>

            <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                <?php _e( 'Archivos de autor', 'alba' ); ?>

            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <?php _e( 'Archivos', 'alba' ); ?>
            <?php } ?>
        </h1>
    </header>

	<?php
    while (have_posts()) : the_post();
        get_template_part( 'partials/content', get_post_format() );
    endwhile;
    ?>

		<!-- Previous/Next page navigation -->
        <div class="pagination">
            <?php alba_pagination(); ?>
        </div>
    <?php else :
    get_template_part( 'partials/content', 'none' );
 endif; ?>

</div>
<?php get_footer(); ?>