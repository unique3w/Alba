<?php
/* ======================================================================
Page.php
Template for individual blog pages.
* ====================================================================== */
get_header(); ?>
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="primary" class="content-area">
        <?php
            get_template_part( 'partials/content', 'page' );

            // Previous/next post navigation.
            $args = array(
            'before'            => '<ol class="post-pagination">' . __('Pages:', 'alba'),
            'after'             => '</ol>',
            'link_before'       => '',
            'link_after'        => '',
            'next_or_number'    => 'number',
            'nextpagelink'      => __('Página siguiente', 'alba'),
            'previouspagelink'  => __('Página anterior', 'alba'),
            'pagelink'          => '%',
            'echo'              => 1
            );
            wp_link_pages($args);

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || '0' != get_comments_number() ) {
                comments_template();
            }
         ?>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>