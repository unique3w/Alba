<?php
/* ======================================================================
    content-quote.php
    Template for showing post formats content
 * ====================================================================== */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <aside class="post-meta">
         <a href="<?php the_permalink(); ?>"><i class="ion format-icon"></i></a>
            <p class="alba-cat">
                <?php
                $categories_list = get_the_category_list( __( ', ', 'alba' ) );
                if ( $categories_list ) :
                ?>
                <?php printf( __( '%1$s', 'alba' ), $categories_list ); ?>
                <?php endif; // End if categories ?>
            </p>
        </aside>
    </header>
    <footer>

    <div class="post-quote post-title">
        <?php the_content(); ?>
    </div>

    </footer>
</article>