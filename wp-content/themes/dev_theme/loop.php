<?php if($pageTitle == "Latest News"): ?>
  <div id="blog-outer">
    <div id="blog">
<?php endif; ?>
<?php while(have_posts()) : the_post(); ?>
  <article>
    <?php if($pageTitle == "Latest News"): ?>
      <h1 <?php if($pageTitle =="Latest News"){ ?>class="blogh1"<?php } ?>>
        <a href="<?php the_permalink() ?>" 
           rel="bookmark" 
           title="Permanent Link to <?php the_title_attribute(); ?>">
           <?php the_title(); ?>
        </a>
      </h1>
      <div class="blog-divider"></div>
      <time>Published <?php echo the_date('F d, Y g:ia'); ?></time>

      <div class="post-thumbnail">    
        <?php the_post_thumbnail(); ?>  
      </div>         
    <?php endif; ?>

    <div class="entry">  
      <?php if($pageTitle == "Latest News" && !(is_singular()) || is_search()): ?>
        <?php the_excerpt(); ?>
      <?php else: ?>
        <?php the_content() ?>
      <?php endif; ?>
    </div>
  </article>
<?php endwhile; ?>
<?php if($pageTitle == "Latest News"): ?>
    </div>
  </div>
<?php endif; ?>
