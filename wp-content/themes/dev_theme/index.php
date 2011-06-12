<?php ob_start(); ?>

<div id="slideshow">
    <a href="/weddings"><section class="one"></section></a>
    <a href="/events"><section class="two"></section></a>
    <a href="/events"><section class="three"></section></a>
    <?php /*
    <?php $page = get_page_by_title('Main slideshow'); ?>
    <section>
        <h1><?php echo get('heading',1,1,3,$page->ID) ?></h1>
        <h2><?php echo get('ft_img_content',1,1,3,$page->ID) ?></h2>
        <?php echo get_image('slideshow_image_featured_image',1,1,3,$page->ID); ?>
    </section>
    <section>
        <h1><?php echo get('heading2',1,1,3,$page->ID) ?></h1>
        <h2><?php echo get('content2',1,1,3,$page->ID) ?></h2> 
        <?php echo get_image('slideshow_image_image',1,1,3,$page->ID); ?>
    </section>
    <section>
        <h1><?php echo get('heading3',1,1,3,$page->ID) ?></h1>
        <h2><?php echo get('content3',1,1,3,$page->ID) ?></h2>
        <?php echo get_image('slideshow_image_image2',1,1,3,$page->ID); ?>
    </section>
    */ ?>
</div>

<section id="twitter"><img src="<?php bloginfo('template_directory') ?>/images/twitter-lg.png" alt="Twitter" class="left" /></section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
