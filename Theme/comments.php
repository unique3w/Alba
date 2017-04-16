<?php
/* ======================================================================
  Comments.php
  Template for post comments.
 * ====================================================================== */

if ( post_password_required() ) : ?>
  <p class="nopassword"><?php esc_html_e( 'Este post está protegido. Entra la contraseña para poder ver los comentarios.', 'alba' ); ?></p>
  <?php
  /* Stop the rest of comments.php from being processed,
   * but don't kill the script entirely -- we still have
   * to fully load the template.
   */
  return;
endif;
?>

<?php // You can start editing here -- including this comment! ?>
<?php if ( have_comments() ) : ?>

<h2 class="comments-title text-center">
   <span><?php
   printf(
     _n(
       'Un comentario', '%1$s Comentarios',
       get_comments_number(), 'alba'
     ),
     number_format_i18n( get_comments_number() )
   ); ?></span>
</h2>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
      <nav id="comment-nav-above" class="comment-navigation">
        <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Navegación', 'alba' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Anteriores', 'alba' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( 'Recientes &rarr;', 'alba' ) ); ?></div>
      </nav>
    <?php endif; // check for comment navigation ?>

    <ol class="commentlist">
      <?php wp_list_comments( array( 'format' => 'html5', 'avatar_size' => 45 ) ); ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
      <nav id="comment-nav-below"  class="comment-navigation">
        <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Navegación', 'alba' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Anteriores', 'alba' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( 'Recientes &rarr;', 'alba' ) ); ?></div>
      </nav>
    <?php endif; // check for comment navigation ?>

  <?php endif; // have_comments() ?>

  <?php
  // If comments are closed and there are no comments, let's leave a little note, shall we?
  if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p class="nocomments"><?php esc_html_e( 'Los comentarios están cerrados.', 'alba' ); ?></p>
  <?php endif; ?>

  <?php

  $commenter = wp_get_current_commenter();
  $req       = get_option( 'require_name_email' );
  $aria_req  = ( $req ? " aria-required='true'" : '' );

  $args = array(
    'format'        => 'html5',
    'title_reply'   => '<span>Enviar respuesta</span>',
    'class_submit'  => 'alba-submit',
    'comment_field' => '<p class="comment-form-comment"><textarea placeholder="Añade comentarios aquí" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
      '</textarea></p>',

    'fields' => array(
      'author' =>
        '<p class="comment-form-author"><input placeholder="Nombre *" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30"' . $aria_req . ' /></p>',

      'email' =>
        '<p class="comment-form-email"><input placeholder="Email *" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
        '" size="30"' . $aria_req . ' /></p>',

      'url' =>
        '<p class="comment-form-url"><input placeholder="Website" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30" /></p>',
    ),
  );

  comment_form( $args );
  ?>