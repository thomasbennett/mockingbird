<?php 
/*
* Template Name: Latest News
*/
?>

<?php ob_start(); ?>

<?php query_posts('category_name=news') ?>
<?php include('loop.php') ?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
