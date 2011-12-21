<?php include_once('wp-config.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]>   <html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]>   <html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title><?php bloginfo('name') . ' ' . wp_title(); ?></title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="author" content="Thomas Bennett for iostudio" />
  <meta name="viewport" content="width=device-width, intial-scale=1, maximum-scale=1">

  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/style.css" />

  <?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
  <?php wp_enqueue_script('jquery'); ?>

  <?php get_header() ?>
  <script src="<?php bloginfo('template_directory') ?>/js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>
<<<<<<< HEAD
  <div id="container">
    <header>
      <a href="/"><h1 id="logo"><?php bloginfo('name'); ?></h1></a>
      <nav>
          
      </nav>
    </header>

    <div id="content">
      <?php echo $content ?>
    </div>

    <aside>
      <?php get_sidebar(); ?>
    </aside>
    <div class="clear"></div>
  </div>

  <footer>
    <?php get_footer() ?>
  </footer>
=======
    <div id="container">
        <header>
            <a href="/"><h1 id="logo"><?php bloginfo('name'); ?></h1></a>
            <div class="nav-hover"></div>
            <nav class="right">
                <a id="what-we-do" class="nav-link" href="/what-we-do">What We Do</a>
                <a id="about-us" class="nav-link" href="/information">Information</a>
                <a id="contact" class="nav-link" href="/contact">Contact</a>
                <a id="latest-updates" class="nav-link" href="/latest-news">Latest News</a>
            </nav>
        </header>

        <?php if(isset($pageTitle)): ?>
          <aside>
            <?php get_sidebar(); ?>
          </aside>
        <?php endif; ?>

        <div id="content">
            <?php echo $content ?>
        </div>
    </div>

    <footer>
        <?php get_footer() ?>
        <div class="city"></div>
    </footer>

    <?php if(is_home()): ?>
        <style>#content { margin-bottom: 0 !important }</style>
        <script src="http://twitterjs.googlecode.com/svn/trunk/src/twitter.min.js"></script>
        <script>
            getTwitters('twitter', { 
                id: 'MockingBMusic', 
                count: 1, 
                enableLinks: true, 
                ignoreReplies: true, 
                clearContents: false,
                template: '<span><a href="http://twitter.com/%user_screen_name%/statuses/%id_str%/">%text%</a></span><span class="twt-time">%time%</span>'
            });
        </script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cycle.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cycle-init.js"></script>
    <?php endif; ?>        

    <script src="<?php bloginfo('template_directory') ?>/js/plugins.js"></script>
    <script src="<?php bloginfo('template_directory') ?>/js/script.js"></script>
>>>>>>> origin/master

  <script src="<?php bloginfo('template_directory') ?>/js/plugins.js"></script>
  <script src="<?php bloginfo('template_directory') ?>/js/script.js"></script>

  <!--[if lt IE 7 ]>
    <script src="<?php bloginfo('template_directory') ?>/js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg"); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
  <![endif]-->
</body>
</html>
