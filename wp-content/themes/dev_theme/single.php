<?php
/* Single */
ob_start();

$pageTitle = "Latest News";
include('loop.php');

if(isset($blog)):
    comments_template();
endif;

$content = ob_get_clean();
require('template.php');
?>
