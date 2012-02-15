<?php

/* 404 */
ob_start();

if(have_posts()):
  while(have_posts()):
    the_post();
    include('loop.php');
  endwhile;
else: ?>
    <h1>Whoops...</h1>
    <p>I've searched and searched but I can't find the page you're looking for. Try again?</p>
<?php
endif;

$content = ob_get_clean(); 
require('template.php');

?>
