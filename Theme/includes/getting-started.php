<?php
/**
 * Redirect on theme activation
 */
if ( is_admin() && isset( $_GET['activated'] ) ) {
	wp_redirect( admin_url( "themes.php?page=getting-started" ) );
}

/**
 * Add 'Getting Started' to side menu
 */
function alba_getting_started() {
	add_theme_page( 'Getting Started', 'Getting Started', 'edit_theme_options', 'getting-started', 'alba_function', 99 );
}

add_action( 'admin_menu', 'alba_getting_started' );

/**
 * Getting Started Page
 */
function alba_function() {
	$wpv_theme = wp_get_theme();
	$support_url  = "http://wpvita.com/support/";
	$docs_url     = "http://wpvita.com/docs/alba/";
	$promo_url 	  = "http://wpvita.com/recommends/bluehost/";
	$natura_url   = "http://wpvita.com/wordpress/themes/natura/";
	?>

	<div class="wpvgs-wrap">

		<div class="wpvgs-info">
			<div class="wpvgs-thumb"></div>
			<div class="wpvgs-desc">
				<h3><?php echo esc_html( $wpv_theme->get( 'Name' ) ); ?></h3>
				<span><?php printf( esc_html__( 'Version %s', 'alba' ), $wpv_theme->get( 'Version' ) ); ?></span>
				<p>
					<?php printf( esc_html__( 'Thanks for downloading %s, we truly appreciate the support and the opportunity to share our work with you.', 'alba' ), $wpv_theme->get( 'Name' ) ); ?>
				</p>
			</div>
		</div>

		<div class="wpvgs-main">
			<div class="tab-content-wrap wpvgs-start tab-content">
				<div id="wpvgs-overview">
					<h3><?php esc_html_e( 'Getting Started', 'alba' ); ?></h3>

					<div class="wpvgs-widget">
						<h3><?php esc_html_e( 'Customize', 'alba' ); ?>&nbsp;<?php echo esc_html( $wpv_theme->get( 'Name' ) ); ?></h3>
						<p><?php esc_html_e( 'Start customizing the theme and personalize it with your own taste and style.', 'alba' ); ?></p>
						<p>
							<a href="<?php echo esc_url( self_admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Visit Customizer', 'alba' ); ?></a>
						</p>
					</div>

					<div class="wpvgs-widget">
						<h3><?php esc_html_e( 'Support', 'alba' ); ?></h3>
						<p><?php esc_html_e( 'Need more help? Keep in touch with us. Responses to your Concern will be around 24-48hrs max.', 'alba' ); ?></p>
						<p>
							<?php echo '<a target="_blank" class="button button-primary" href="' . esc_url( $support_url ) . '">' . esc_html__( 'Get Support', 'alba' ) . '</a>';
							?>
						</p>
					</div>

					<div class="wpvgs-widget">
						<h3><?php esc_html_e( 'Documentation', 'alba' ); ?></h3>
						<p><?php esc_html_e( 'A complete guide that will help you learn more about Natura Theme and how to maximize its potential. ', 'alba' ); ?></p>
						<p><?php echo '<a target="_blank" class="button button-primary" href="' . esc_url( $docs_url ) . '">' . esc_html__( 'View Documentation', 'alba' ) . '</a>';
							?></p>
					</div>

					<div class="wpvgs-widget">
						<h3><?php esc_html_e( 'Get Natura', 'alba' ); ?></h3>
						<p><?php esc_html_e( 'A powerful Responsive WordPress Theme for serious bloggers. Learn more about the awesome features. Get your Natura Theme Now!', 'alba' ); ?></p>
						<p><?php echo '<a target="_blank" class="button button-primary" href="' . esc_url( $natura_url ) . '">' . esc_html__( 'Buy Now', 'alba' ) . '</a>';
							?></p>
					</div>

					<div class="wpvgs-widget">
						<h3><?php esc_html_e( 'Recommended Hosting', 'alba' ); ?></h3>
						<p><?php esc_html_e( 'We recommend Bluehost for your website hosting. From $7.99 now at $3.95/month! Get your discount Now!', 'alba' ); ?></p>
						<p><?php echo '<a target="_blank" class="button button-primary" href="' . esc_url( $promo_url ) . '">' . esc_html__( 'Get Hosting', 'alba' ) . '</a>';
							?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<style type="text/css">
		.wpvgs-wrap {
			margin: 0;
			padding-top: 40px;
			margin-left: 20px;
			max-width: 980px;
			width: 100%;
			color: #23282d;
			font-size: 14px;
			line-height: 26px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		.wpvgs-info {
			overflow: hidden;
			width: 980px;
		}

		.wpvgs-info h3 {
			margin: 0;
			color: #23282d;
			font-weight: 300;
			font-size: 50px;
			line-height: 50px;
			padding-bottom: 20px;
		}

		.wpvgs-desc span {
			color: #7b8898;
			font-size: 16px;
		}

		.wpvgs-desc p {
			font-size: 18px;
			color: #2a3138;
			line-height: 30px;
			overflow: hidden;
		}

		.wpvgs-main {
			background-color: #fff;
			overflow: hidden;
			margin-top: 40px;
			border-radius: 5px;

		}

		#wpvgs-overview {
			overflow: hidden;
			margin-bottom: 25px;
		}

		.wpvgs-widget {
			padding: 20px;
			background: #F6F7F8;
			margin: 20px 0 0;
			width: 246px;
			float: left;
			height: 215px;
			margin-right: 20px;
			position: relative;
		}

		.wpvgs-widget .button {
			position: absolute;
			bottom: 20px;
			width: 100%;
			max-width: 240px;
			text-align: center;
			height: 34px;
			line-height: 30px;
		}

		.wpvgs-widget:nth-of-type(3n) {
			margin-right: 0;
		}

		.wpvgs-widget h3 {
			margin-top: 0;
			font-size: 20px;
			color: #23282d;
			font-weight: normal;
		}

		.wpvgs-widget p {
			color: #7B8898;
			font-size: 16px;
		}

		.wpvgs-main .tab-content {
			background: #FFF;
			box-sizing: border-box;
			font-size: 18px;
			position: relative;
		}

		.wpvgs-main .tab-content-wrap {
			padding: 40px 40px 20px;
			overflow: hidden;
		}

		.wpvgs-main .tab-content p {
			font-size: 16px;
			line-height: 26px;
		}

		.wpvgs-thumb {
			background: #47CAB5 url( <?php echo get_template_directory_uri();?>/includes/assets/images/screenshot.jpg) no-repeat;
			width: 310px;
			height: 200px;
			float: left;
			margin-right: 40px;
		}

		.wpvgs-start h3 {
			margin: 0;
			color: #2a3138;
			font-size: 20px;
			font-weight: normal;
		}

		.wpvgs-wrap hr {
			margin: 30px 0;
			border: 1px solid #f0f0f0;
			border-bottom: 0;
		}

		.wpvgs-start h4 {
			font-size: 14px;
			font-weight: normal;
			margin: 0;
		}

		.wpvgs-widget .button-primary {
			background: #47cab5 !important;
			border-color: #47cab5 !important;
			-webkit-box-shadow: none;
			box-shadow: none;
			color: #fff;
			text-decoration: none;
			text-shadow: none;
		}
	</style>

	<?php
}