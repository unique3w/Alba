<?php
/* ======================================================================
    content.php
    Template for showing post formats content
 * ====================================================================== */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h2 class="post-title">
	        <a href="<?php the_permalink(); ?>">
	            <?php the_title(); ?>
	        </a>
        </h2>

        <div class="alba-date"><?php alba_date_absolute(); ?></div>
    </header>

    <footer>
    <div class="post-content text-left">
        <?php the_content(); ?>
    </div>


    </footer>
</article>