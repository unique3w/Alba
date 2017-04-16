<?php
/* ======================================================================
header.php
Template for header content.
* ====================================================================== */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container">

  <div class="alba-menu">
        <?php get_template_part( 'partials/nav-main', 'Site Navigation' ); ?>
  </div>

  <div class="alba-search">
        <?php get_search_form(); ?>
  </div>


    <header id="masthead" <?php //alba_header_cover(); ?>>
  
    <?php the_custom_header_markup(); ?>

        <?php if ( ! get_header_image() == "" ) { ?>
            <div class="header-overlay"></div>
        <?php } ?>

        <div class="header-inner">
            <div class="nav-toggle menu-btn"><i class="icons ion-android-menu"></i></div>
            <div class="alba-title">
               <div class="alba-title-inner">
                <?php alba_logo(); ?>
                <?php if ( ! get_header_image() == "" ) { ?>
                    <div class="site-description"><?php bloginfo( 'description' ); ?></div>
                <?php } ?>
                </div>
            </div>
            <div class="search-btn"><i class="icons ion-search"></i></div>
        </div>

    <?php  if ( 1 == get_theme_mod( 'alba_author_bio', 0 ) ) {  ?>
        <div class="header-author">
            <?php if ( get_theme_mod( 'alba_author_img' ) ) { ?>
                <img class="author-img" alt="author" src="<?php echo esc_url( get_theme_mod( 'alba_author_img' ) ); ?>">
            <?php } ?>
            <div class="author-details">
                <?php if ( get_theme_mod( 'alba_author_title' ) ) { ?>
                    <h2 class="author-name"><?php echo esc_html( get_theme_mod( 'alba_author_title' ) ); ?></h2>
                <?php } ?>

                    <div class="author-social">
                        <?php if ( get_theme_mod( 'alba_author_fb' ) ) { ?>
                            <a title="Facebook" target="_blank" rel="nofollow" href="<?php echo esc_url( get_theme_mod( 'alba_author_fb' ) ); ?>"><i class="icons ion-social-facebook"></i></a>
                        <?php } ?>

                        <?php if ( get_theme_mod( 'alba_author_tw' ) ) { ?>
                            <a title="Twitter" target="_blank" rel="nofollow" href="<?php echo esc_url( get_theme_mod( 'alba_author_tw' ) ); ?>"><i class="icons ion-social-twitter"></i></a>
                        <?php } ?>

                        <?php if ( get_theme_mod( 'alba_author_ig' ) ) { ?>
                            <a title="Instagram" target="_blank" rel="nofollow" href="<?php echo esc_url( get_theme_mod( 'alba_author_ig' ) ); ?>"><i class="icons ion-social-instagram"></i></a>
                        <?php } ?>

                        <?php if ( get_theme_mod( 'alba_author_li' ) ) { ?>
                            <a title="Linkedin" target="_blank" rel="nofollow" href="<?php echo esc_url( get_theme_mod( 'alba_author_li' ) ); ?>"><i class="icons ion-social-linkedin"></i></a>
                        <?php } ?>

                        <?php if ( get_theme_mod( 'alba_author_github' ) ) { ?>
                            <a title="Github" target="_blank" rel="nofollow" href="<?php echo esc_url( get_theme_mod( 'alba_author_github' ) ); ?>"><i class="icons ion-social-github"></i></a>
                        <?php } ?>


                        <?php if ( get_theme_mod( 'alba_author_codepen' ) ) { ?>
                            <a title="Codepen" target="_blank" rel="nofollow" href="<?php echo esc_url( get_theme_mod( 'alba_author_codepen' ) ); ?>"><i class="icons ion-social-codepen"></i></a>
                        <?php } ?>

                        <?php if ( get_theme_mod( 'alba_author_rss' ) ) { ?>
                            <a title="RSS Feed" target="_blank" rel="nofollow" href="<?php echo esc_url( get_theme_mod( 'alba_author_rss' ) ); ?>"><i class="icons ion-social-rss"></i></a>
                        <?php } ?>
                    </div>

                <?php if ( get_theme_mod( 'alba_author_desc' ) ) { ?>
                    <p class="author-desc"><?php echo esc_html( get_theme_mod( 'alba_author_desc' ) ); ?></p>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</header>