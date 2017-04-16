<?php
/* ======================================================================
    content.php
    Template for showing post formats content
 * ====================================================================== */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if(! has_post_format( 'quote' ) ) { ?>
    <header>
        <aside class="post-meta">
         <i class="ion format-icon"></i>
            <p class="alba-cat">
                <?php
                $categories_list = get_the_category_list( __( ', ', 'alba' ) );
                if ( $categories_list ) :
                ?>
                <?php printf( __( '%1$s', 'alba' ), $categories_list ); ?>
                <?php endif; // End if categories ?>
            </p>
        </aside>

        <h1 class="post-title">
	        <a href="<?php the_permalink(); ?>">
	            <?php the_title(); ?>
	        </a>
        </h1>

        <div class="alba-date">
            <?php alba_date_absolute(); ?>
        </div>

        <?php if ( ! is_single() ) { ?>
               <div class="post-thumb">
                    <a href="<?php the_permalink(); ?>" class="u-url url" title="<?php printf( esc_attr__( 'Permalink a %s', 'alba' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                        <?php
                        if ( has_post_thumbnail() ) {
                             the_post_thumbnail( "post_thumb" );
                        ?>
                        <?php } ?>
                    <?php if ( has_post_format( 'video' ) ): // Video Post Format ?>
                        <i class="ion ion-ios-play-outline"></i>
                    <?php endif; ?>
                    </a>
                </div>
        <?php } ?>
    </header>
 <?php } ?>


    <div class="post-content text-left">
        <?php 
            
        the_content(); 
        
        alba_tags(); 

        $args = array(
            'before'           => '<ol class="post-pagination">' . esc_html__( 'Páginas:', 'natura' ),
            'after'            => '</ol>',
            'next_or_number'   => 'number',
            'nextpagelink'     => esc_html__( 'Siguiente', 'natura' ),
            'previouspagelink' => esc_html__( 'Anteiror', 'natura' ),
            'pagelink'         => '%',
            'echo'             => 1
        );
        wp_link_pages( $args );
        ?>
    </div>

    <?php
        // Previous/next post navigation.
        the_post_navigation(
            array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Siguiente', 'alba' ) . '</span> ' .
                    '<span class="screen-reader-text">' . esc_html__( 'Siguiente:', 'alba' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Anterior', 'alba' ) . '</span> ' .
                    '<span class="screen-reader-text">' . esc_html__( 'Anterior:', 'alba' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            )
        );
     ?>
</article>