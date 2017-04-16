<?php
/* ======================================================================
    content.php
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

        <h2 class="post-title">
	        <a href="<?php the_permalink(); ?>">
	            <?php the_title(); ?>
	        </a>
        </h2>

        <div class="alba-date"><?php alba_date_absolute(); ?></div>

    <?php if ( has_post_thumbnail() ) { ?>
       <div class="post-thumb">
            <a href="<?php the_permalink(); ?>" class="u-url url" title="<?php printf( esc_attr__( 'Permalink a %s', 'alba' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">

                <?php the_post_thumbnail( "post_thumb" ); ?>

            <?php if ( has_post_format( 'video' ) ):  ?>
                <i class="ion ion-ios-play-outline"></i>
            <?php endif; ?>

            </a>
        </div>
        <?php } ?>

    </header>

    <footer>
    <div class="post-summary">
        <?php alba_excerpt( 150 ); ?>
    </div>

    <div class="text-center">
        <a class="alba-readmore" rel="nofollow" title="<?php printf( esc_attr__( 'Permalink a %s', 'alba' ), the_title_attribute( 'echo=0' ) ); ?>" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Leer más', 'alba' ); ?></a>
    </div>
    </footer>
</article>