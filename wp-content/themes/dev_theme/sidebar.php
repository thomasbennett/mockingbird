<?php get_search_form() ?>

<div class="divider"></div>

<?php

// set related posts for blog
the_related();

?>

<div class="divider"></div>

<?php 

if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')) :
    // If the Widget sidebar isn't hooked up stuff in here will show up
    // This is being handled in the_related() function
endif; 

?>

<ul id="socials" class="inline">
    <li><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/twitter.png" alt="Twitter" /></a></li>
    <li><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/facebook.png" alt="Facebook" /></a></li>
    <li><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/youtube.png" alt="YouTube" /></a></li>
    <li><a href="<?php bloginfo('rss2_url') ?>"><img src="<?php bloginfo('template_directory') ?>/images/rss.png" alt="RSS" /></a></li>
</ul>
