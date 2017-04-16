
<?php if ( is_active_sidebar( 'footer1' ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) ) : ?>
  <div id="secondary" class="widget-area">
  	<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
  		<div class="footer-widget"><?php dynamic_sidebar( 'footer1' ); ?></div>
  	<?php endif; ?>
  	<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
  		<div class="footer-widget"><?php dynamic_sidebar( 'footer2' ); ?> </div>
  	<?php endif; ?>
  	<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
  		<div class="footer-widget"><?php dynamic_sidebar( 'footer3' ); ?> </div>
  	<?php endif; ?>
  </div>
<?php endif; ?>