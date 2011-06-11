<?php get_search_form() ?>

<div class="divider"></div>

<?php

// set related posts for blog
the_related();

?>

<div class="divider"></div>

<img src="http://mockingbird.localhost/wp-content/uploads/2011/06/about-300x200.jpg" width="205" alt="Chris and Nicki" />

<?php 

if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')) :
    // If the Widget sidebar isn't hooked up stuff in here will show up
    // This is being handled in the_related() function
endif; 

?>

<ul id="socials" class="inline">
    <li><a href="http://twitter.com/#!/MockingBMusic"><img src="<?php bloginfo('template_directory') ?>/images/twitter.png" alt="Twitter" /></a></li>
    <li><a href="http://www.facebook.com/pages/Mockingbird-Musicians/212073295491901"><img src="<?php bloginfo('template_directory') ?>/images/facebook.png" alt="Facebook" /></a></li>
    <li><a href="http://www.youtube.com/user/mockingbirdmusicians"><img src="<?php bloginfo('template_directory') ?>/images/youtube.png" alt="YouTube" /></a></li>
    <li><a href="<?php bloginfo('rss2_url') ?>"><img src="<?php bloginfo('template_directory') ?>/images/rss.png" alt="RSS" /></a></li>
</ul>
