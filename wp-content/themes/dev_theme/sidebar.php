<?php 

if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')) :
    // If the Widget sidebar isn't hooked up stuff in here will show up
    // This is being handled in the_related() function
endif; 

?>
