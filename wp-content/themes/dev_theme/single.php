<?php
/* Single */
ob_start();

include('loop.php');

comments_template();

$content = ob_get_clean();
require('template.php');
?>
