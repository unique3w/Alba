<?php
/**
 * Alba Theme support
 */

if ( ! isset( $content_width ) ) {
	$content_width = 840;
}

function alba_theme_support() {
	if ( function_exists( 'add_theme_support' ) ) {
		global $wp_version;

		load_theme_textdomain( 'alba', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post_thumb', 840, 500, true );

		$args = array(
			'width'                  => 960,
			'height'                 => 640,
			'video'              => true,
		);
		add_theme_support( 'custom-header', $args );

		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		add_theme_support( 'menus' );
		add_theme_support(
			'post-formats', array(
				'image',
				'audio',
				'video',
				'gallery',
				'quote',
				'link'
			)
		);
		add_theme_support(
			'custom-background', array(
			'default-color' => '#424D5A',
		)
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}

add_action( 'after_setup_theme', 'alba_theme_support' );

/**
 * Enqueue Styles & Scripts
 */

function alba_scripts() {
	if ( ! is_admin() ) {
		wp_enqueue_style( 'alba-style', get_stylesheet_uri(), array(), '1.1' );
		wp_register_style( 'google-font', 'http://fonts.googleapis.com/css?family=Raleway:300i,400,500,700', '', null, 'screen' );
		wp_enqueue_style( 'google-font' );
		wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), '2.0.0' );
		wp_enqueue_script( 'alba-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '20170106', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'alba_scripts' );

/**
 * Include required files
 */
require_once( trailingslashit( get_template_directory() ) . 'includes/getting-started.php' );
require_once( trailingslashit( get_template_directory() ) . 'includes/customizer.php' );

/**
 * Register: Navigation Menu
 */
function alba_register_my_menus() {
	$locations = array(
		'main-nav' => __( 'Main Menu', 'alba' )
	);
	register_nav_menus( $locations );
}

add_action( 'init', 'alba_register_my_menus' );

function alba_main_nav() {
	$args = array(
		'theme_location' => 'main-nav',
		'menu'           => __( 'Main Menu', 'alba' ),
		'container'      => 'false',
		'container_id'   => 'access',
		'menu_class'     => 'nav',
		'echo'           => true,
		'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'          => 1
	);
	wp_nav_menu( $args );
}

/**
 * Register: Sidebars
 */

function alba_register_sidebars() {
	$footer1 = array(
		'name'          => __( 'Footer Left', 'alba' ),
		'id'            => 'footer1',
		'description'   => __( 'Footer Left Widgets', 'alba' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	);
	register_sidebar( $footer1 );

	$footer2 = array(
		'name'          => __( 'Footer Center', 'alba' ),
		'id'            => 'footer2',
		'description'   => __( 'Footer Center Widgets', 'alba' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	);
	register_sidebar( $footer2 );

	$footer3 = array(
		'name'          => __( 'Footer Right', 'alba' ),
		'id'            => 'footer3',
		'description'   => __( 'Footer Right Widgets', 'alba' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	);
	register_sidebar( $footer3 );
}

add_action( 'widgets_init', 'alba_register_sidebars' );

/**
 * Content Excerpt
 */
if ( ! function_exists( 'alba_excerpt' ) ) :
	function alba_excerpt( $charlength ) {
		global $post;
		$excerpt = get_the_excerpt();
		$charlength ++;
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex                  = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords                = explode( ' ', $subex );
			$exwords[ $exwords[0] ] = isset( $exwords[1] ) ? $exwords[1] : the_excerpt();
			$excut                  = - ( mb_strlen( $exwords[ count( $exwords ) - 2 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo esc_html( $subex );
			}
			echo '...';
		} else {
			echo esc_html( $excerpt );
		}
	}
endif;

/**
 * Pagination
 */
if ( ! function_exists( 'alba_pagination' ) ) :
	function alba_pagination() {
		global $wp_query;
		$big         = 999999999;
		$page_format = paginate_links(
			array(
				'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'  => '?paged=%#%',
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total'   => $wp_query->max_num_pages,
				'type'    => 'array'
			)
		);

		if ( is_array( $page_format ) ) {
			$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

			$prev = get_previous_posts_link( '<span class="ion-android-arrow-back"></span>' );
			$next = get_next_posts_link( '<span class="ion-android-arrow-forward"></span>' );

			echo '<span class="prev page-numbers">' . $prev . '</span>';
			echo '<span class="pages">' . $paged . '<span class="gray-text">of</span>' . $wp_query->max_num_pages . '</span>';
			echo '<span class="next page-numbers">' . $next . '</span>';
		}
	}
endif;

/**
 * Post Meta: Absolute Date
 */
if ( ! function_exists( 'alba_date_absolute' ) ) :
	function alba_date_absolute() {
		printf(
			_x( 'hace %s', '%s = human-readable time difference', 'alba' ),
			human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
		);
	}
endif;


/**
 * Post Meta: Post Tags
 */
if ( ! function_exists( 'alba_tags' ) ) :
	function alba_tags() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ' ', 'alba' ) );
			if ( $tags_list ) {
				printf( '<div class="post-tags"><span class="tags-links">' . esc_html__( 'Tags: %1$s', 'alba' ) . '</span></div>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;


/**
 * Alba Logo Function
 */
if ( ! function_exists( 'alba_logo' ) ) :
    function alba_logo() {
        $logo_tag  = ( is_front_page() ) ? 'h1' : 'div';
        $logo_class = ( get_theme_mod( 'alba_logo' ) ) ? 'site-logo': '';
        $logo_src  = get_theme_mod( 'alba_logo' );
        $title_tag = get_bloginfo( 'name' );
        ?>
        <<?php echo esc_attr( $logo_tag ); ?> class="site-title <?php echo esc_attr($logo_class); ?>">
        <?php if ( get_theme_mod( 'alba_logo' ) ) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img alt="<?php echo esc_attr( $title_tag ); ?>" src="<?php echo esc_attr( $logo_src ); ?>" />
            </a>
        <?php } else { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_attr( $title_tag ); ?></a>
        <?php } ?>
        </<?php echo esc_attr( $logo_tag ); ?>>
        <?php
    }
endif;

/**
* Add class to first post in single for post nav
*/
function alba_first_post( $classes ) {
	$next_post = get_next_post();
		if ( is_single() && empty( $next_post )) {
					$classes[] = 'alba-first-post';
		}
		return $classes;
}
add_filter( 'post_class', 'alba_first_post' );