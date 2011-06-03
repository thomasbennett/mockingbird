            <?php include('settings.php'); ?>
            <?php $odd_or_even = 'odd'; ?> 
            <?php while(have_posts()) : the_post(); ?>
                <div id="slideshow">
                    <?php $page = get_page_by_title('Main slideshow'); ?>
                    <section>
                        <h1><?php echo get('heading',1,1,3,$page->ID) ?></h1>
                        <span><?php echo get('ft_img_content',1,1,3,$page->ID) ?></span>
                        <?php echo get_image('slideshow_image_featured_image',1,1,3,$page->ID); ?>
                    </section>
                    <section>
                        <h1><?php echo get('heading2',1,1,3,$page->ID) ?></h1>
                        <span><?php echo get('content2',1,1,3,$page->ID) ?></span> 
                        <?php echo get_image('slideshow_image_image',1,1,3,$page->ID); ?>
                    </section>
                    <section>
                        <h1><?php echo get('heading3',1,1,3,$page->ID) ?></h1>
                        <span><?php echo get('content3',1,1,3,$page->ID) ?></span>
                        <?php echo get_image('slideshow_image_image2',1,1,3,$page->ID); ?>
                    </section>
                </div>
            <?php endwhile; ?>     

            <?php rewind_posts(); ?>
