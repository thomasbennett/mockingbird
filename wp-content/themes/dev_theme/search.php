<?php
/**
 * Search Results
 */
ob_start();
?>
    <?php if (function_exists('relevanssi_didyoumean')) { relevanssi_didyoumean(get_search_query(), "<p>Did you mean: ", "?</p>", 5); }?>
    <?php if ( have_posts() ) : ?>
        <h1 class="left"><?php printf( __( 'Search Results for: %s', 'unclejim' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        <p class="right"><?php echo $wp_query->found_posts . ' <small>hits were found.</small>'; ?><p>
        <div class="divider"></div>
        <?php query_posts('posts_per_page=-1') ?>
        <?php include('loop.php'); ?>
    <?php else : ?>
        <div class="post no-results not-found">
            <h2 class="entry-title"><?php _e( 'Nothing Found', 'unclejim' ); ?></h2>
            <div class="entry-content">
                <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'dev_theme' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        </div><!-- #post-0 -->
    <?php endif; ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php')?>
