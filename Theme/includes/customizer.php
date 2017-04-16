<?php

/**
 * Load Theme Options (Customizer)
 */

# Customizer Init
function alba_customize_register( $wp_customize ) {

    if ( ! isset( $wp_customize ) ) {
        return;
    }

    # Remove defaults
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'themes' );
    $wp_customize->remove_control( 'nav_menus' );
    $wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );

    # Change default options
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_image' )->transport = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport = 'refresh';

    $wp_customize->get_control( 'background_image' )->section      = 'alba_color_bg';
    $wp_customize->get_control( 'background_repeat' )->section     = 'alba_color_bg';
    $wp_customize->get_control( 'background_position' )->section = 'alba_color_bg';
    $wp_customize->get_control( 'background_attachment' )->section = 'alba_color_bg';
    $wp_customize->get_control( 'background_color' )->section      = 'alba_color_bg';
    $wp_customize->get_control( 'background_size' )->section      = 'alba_color_bg';
    $wp_customize->get_control( 'background_size' )->section      = 'alba_color_bg';
    $wp_customize->get_control( 'background_preset' )->section      = 'alba_color_bg';
    $wp_customize->get_control( 'header_image' )->section = 'alba_header';
    $wp_customize->get_control( 'header_video' )->section = 'alba_header';
    $wp_customize->get_control( 'external_header_video' )->section = 'alba_header';
    $wp_customize->get_control( 'background_color' )->default      = '#424D5A';
    $wp_customize->get_control( 'blogname' )->priority  = 1;
    $wp_customize->get_control( 'background_image' )->priority  = 20;
    $wp_customize->get_control( 'background_repeat' )->priority  = 20;
    $wp_customize->get_control( 'background_repeat' )->priority  = 20;
    $wp_customize->get_control( 'background_position' )->priority  = 20;
    $wp_customize->get_control( 'background_attachment' )->priority  = 20;
    $wp_customize->get_control( 'background_color' )->priority  = 20;
   
    /**
     * Section: Header
     */
    $wp_customize->add_section(
        'alba_general', array(
            'title'    => esc_html__( 'General', 'alba' ),
            'priority' => 5,
        )
    );

    /**
     * Setting: Enable Author Profile
     */
    $wp_customize->add_setting(
        'alba_hide_credits', array(
            'default'           => 0,
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_checkbox',
        )
    );

    /**
     * Control: Enable Author Profile
     */
    $wp_customize->add_control(
        'alba_hide_credits', array(
            'type'    => 'checkbox',
            'label'   => esc_html__( 'Hide Footer Credits', 'alba' ),
            'section' => 'alba_general',
        )
    );


    /**
     * Section: Site Title & logo
     */
    $wp_customize->add_section(
        'title_tagline', array(
            'title'    => esc_html__( 'Branding', 'alba' ),
            'priority' => 10,
        )
    );

    /**
     * Setting: Logo
     */
    $wp_customize->add_setting(
        'alba_logo', array(
            'default'           => null,
            'capability'        => 'edit_theme_options',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'alba_sanitize_image',
        )
    );

    /**
     * Control: Logo
     */
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'alba_logo',
            array(
                'label'       => esc_html__( 'Logo', 'alba' ),
                'section'     => 'title_tagline',
                'settings'    => 'alba_logo',
            )
        )
    );

    /**
     * Setting: Retina Logo
     */
    $wp_customize->add_setting(
        'alba_retina_logo', array(
            'default'           => null,
            'capability'        => 'edit_theme_options',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'natura_sanitize_image',
        )
    );

    /**
     * Control: Retina Logo
     */
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'alba_retina_logo',
            array(
                'label'       => __( 'Retina Logo', 'natura' ),
                'section'     => 'title_tagline',
                'settings'    => 'alba_retina_logo',
                'description' => __( 'Upload your retina logo, 2x the size. Using the option button below.', 'alba' ),
            )
        )
    );


    /**
     * Section: Header
     */
    $wp_customize->add_section(
        'alba_header', array(
            'title'    => esc_html__( 'Header', 'alba' ),
            'priority' => 12,
        )
    );


    /**
     * Setting: Enable Author Profile
     */
    $wp_customize->add_setting(
        'alba_author_bio', array(
            'default'           => 0,
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_checkbox',
        )
    );

    /**
     * Control: Enable Author Profile
     */
    $wp_customize->add_control(
        'alba_author_bio', array(
            'type'    => 'checkbox',
            'label'   => esc_html__( 'Enable Author Profile', 'alba' ),
            'section' => 'alba_header',
        )
    );

    /**
     * Setting: Author Image
     */
    $wp_customize->add_setting(
        'alba_author_img', array(
            'default'           => null,
            'capability'        => 'edit_theme_options',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'alba_sanitize_image',
        )
    );

    /**
     * Control: Author Image
     */
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'alba_author_img',
            array(
                'label'       => esc_html__( 'Author Image', 'alba' ),
                'section'     => 'alba_header',
                'settings'    => 'alba_author_img',
                'description' => esc_html__( 'Recommended size: 100 x 100px ', 'alba' ),
            )
        )
    );

    /**
     * Setting: Author Title
     */
    $wp_customize->add_setting(
        'alba_author_title', array(
            'transport'         => 'postMessage',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control: Author Title
     */
    $wp_customize->add_control(
        'alba_author_title', array(
            'type'    => 'text',
            'label'   => esc_html__( 'Author Title', 'alba' ),
            'description' => esc_html__( 'Author title or name', 'alba' ),
            'section' => 'alba_header',
        )
    );


    /**
     * Setting: Author Description
     */
    $wp_customize->add_setting(
        'alba_author_desc', array(
            'transport'         => 'postMessage',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control: Author Description
     */
    $wp_customize->add_control(
        'alba_author_desc', array(
            'type'        => 'textarea',
            'label'       => esc_html__( 'Author Description', 'alba' ),
            'section'     => 'alba_header',
            'description' => esc_html__( 'Author Bio', 'alba' ),
        )
    );

    /**
     * Setting: Facebook URL
     */
    $wp_customize->add_setting(
        'alba_author_fb', array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control:  Facebook URL
     */
    $wp_customize->add_control(
        'alba_author_fb', array(
            'type'    => 'text',
            'label'   => esc_html__( 'Facebook URL', 'alba' ),
            'section' => 'alba_header',
        )
    );


    /**
     * Setting: Twitter URL
     */
    $wp_customize->add_setting(
        'alba_author_tw', array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control:  Twitter URL
     */
    $wp_customize->add_control(
        'alba_author_tw', array(
            'type'    => 'text',
            'label'   => esc_html__( 'Twitter URL', 'alba' ),
            'section' => 'alba_header',
        )
    );

     /**
     * Setting: Instagram URL
     */
    $wp_customize->add_setting(
        'alba_author_ig', array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control:  Instagram URL
     */
    $wp_customize->add_control(
        'alba_author_ig', array(
            'type'    => 'text',
            'label'   => esc_html__( 'Instagram URL', 'alba' ),
            'section' => 'alba_header',
        )
    );

    /**
     * Setting: Linkedin URL
     */
    $wp_customize->add_setting(
        'alba_author_li', array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control:  Linkedin URL
     */
    $wp_customize->add_control(
        'alba_author_li', array(
            'type'    => 'text',
            'label'   => esc_html__( 'Linkedin URL', 'alba' ),
            'section' => 'alba_header',
        )
    );

    /**
     * Setting: Github URL
     */
    $wp_customize->add_setting(
        'alba_author_github', array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control:  Github URL
     */
    $wp_customize->add_control(
        'alba_author_github', array(
            'type'    => 'text',
            'label'   => esc_html__( 'Github URL', 'alba' ),
            'section' => 'alba_header',
        )
    );

    /**
     * Setting: Codepen URL
     */
    $wp_customize->add_setting(
        'alba_author_codepen', array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control:  Codepen URL
     */
    $wp_customize->add_control(
        'alba_author_codepen', array(
            'type'    => 'text',
            'label'   => esc_html__( 'Codepen URL', 'alba' ),
            'section' => 'alba_header',
        )
    );

    /**
     * Setting: RSS URL
     */
    $wp_customize->add_setting(
        'alba_author_rss', array(
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Control:  RSS URL
     */
    $wp_customize->add_control(
        'alba_author_rss', array(
            'type'    => 'text',
            'label'   => esc_html__( 'RSS URL', 'alba' ),
            'section' => 'alba_header',
        )
    );

    /**
     * Section: Color & Background
     */
    $wp_customize->add_section(
        'alba_color_bg', array(
            'title'    => esc_html__( 'Color & Background', 'alba' ),
            'priority' => 13,
        )
    );

    /**
     * Setting: Accent Color
     */
    $wp_customize->add_setting(
        'alba_accent_color',
        array(
            'default'           => '#4de1df',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh',
            'sanitize_callback' => 'alba_sanitize_strip_slashes',
        )
    );

    /**
     * Cotrol: Accent Color
     */
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'alba_accent_color',
            array(
                'label'        => esc_html__( 'Global Color', 'alba' ),
                'section'      => 'alba_color_bg',
                'settings'     => 'alba_accent_color',
            )
        )
    );
}
add_action( 'customize_register', 'alba_customize_register' );

/**
 * Enqueue Customizer Styles
 */
function alba_customizer_styles() {
    wp_enqueue_style( 'alba-customizer-style', get_template_directory_uri() . '/includes/assets/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'alba_customizer_styles' );

/**
 * Enqueue customizer preview js
 */
function alba_customizer_live_preview() {
    wp_enqueue_script( 'alba-customizer-preview', get_template_directory_uri() . '/includes/assets/js/customizer-preview.js', array( 'customize-preview' ), '20170106', true );
}
add_action( 'customize_preview_init', 'alba_customizer_live_preview' );

/**
 * Customizer Sanitize: Image
 */
function alba_sanitize_image( $image, $setting ) {
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    $file  = wp_check_filetype( $image, $mimes );

    return ( $file['ext'] ? $image : $setting->default );
}

/**
 * Customizer Sanitize: Text/Textarea
 */
function alba_sanitize_strip_slashes( $input ) {
    return stripslashes( wp_filter_post_kses( addslashes( $input ) ) );
}

/**
 * Customizer Sanitize: Checkbox input
 */
function alba_sanitize_checkbox( $input ) {
    if ( 1 == $input ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Customizer classes in body
 */
function alba_body_classes( $classes ) {

    global $post;

    # Author Bio
    if ( get_theme_mod( 'alba_author_bio' ) ) {
        $classes[] = 'alba-auth-bio';
    }

    # Author Image
    if ( get_theme_mod( 'alba_author_img' ) ) {
        $classes[] = 'alba-auth-img';
    }

    # Header Cover
    if ( get_header_image() == "" ) {
        // do nothing
    } else {
        $classes[] = 'alba-header-cover';
    }

    # Header Video
    if ( has_header_video() ) {
        $classes[] = 'alba-header-cover';
    }


    return $classes;
}
add_filter( 'body_class', 'alba_body_classes' );

/**
 * Customizer head styles
 */
if ( ! function_exists( 'alba_head_styles' ) ) {
    function alba_head_styles() {

        $globalColor = esc_html( get_theme_mod( 'alba_accent_color', '#4de1df' ) );

        echo '<style type="text/css">';

        if ( get_theme_mod( 'alba_accent_color' ) ) {
            echo '.post-content a, .single blockquote:before, .page blockquote:before, .page-numbers a { color:' . $globalColor . ' }';
            echo '.format-icon:before { color:' . $globalColor . ' }';
            echo '.alba-readmore, .alba-submit, #masthead { background:' . $globalColor . ' }';
            echo '#access li a:hover, .current-menu-item a, .alba-cat a { border-color:' . $globalColor . ' }';
            echo '.sticky .post-title:before { border-top-color:' . $globalColor . ' }';
        }

        if ( get_theme_mod( 'alba_retina_logo' ) ) {
            echo '
            @media  only screen and (-webkit-min-device-pixel-ratio: 1.5),
            only screen and (   min--moz-device-pixel-ratio: 1.5),
            only screen and (     -o-min-device-pixel-ratio: 3/2),
            only screen and (        min-device-pixel-ratio: 1.5),
            only screen and (min-resolution: 192dpi) {
              .site-title img { display: none !important; }
              .site-logo a {
                background: url("' . esc_html( get_theme_mod( 'alba_retina_logo' ) ) . '") center no-repeat;
                background-size: contain;
                width: 113px;
                display: block;
                text-indent: -9999px;
              }
          }';
        }

        echo '</style>';

    }
}
add_action( 'wp_head', 'alba_head_styles', 10 );