<?php
/* ======================================================================
    searchform.php
    Template for search form.
    `.screen-reader` class hides label when used
* ====================================================================== */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>" >
    <label class="screen-reader" for="s"><?php _e( 'Buscar en este sitio:', 'alba' ); ?></label>
    <input type="text" class="input-search no-space" id="s" name="s" placeholder="<?php _e( 'Escribe tu búsqueda...', 'alba' ); ?>" value="<?php get_search_query(); ?>">
</form>