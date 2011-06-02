<?php 
/*
* Template Name: Latest News
*/
?>

<?php $pageTitle = "Custom"; ?>
<?php ob_start(); ?>

<?php include('loop.php') ?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
