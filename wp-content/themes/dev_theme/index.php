<?php ob_start(); ?>

<?php include('custom-loop.php') ?>

<section id="twitter"></section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
