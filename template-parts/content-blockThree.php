<?php 
    global $krocks_opt;
    $_column = $krocks_opt['_blogThreecolumn'];
    $_postStyle = $krocks_opt['_postStyle'];
    $_categShow = $krocks_opt['_categShow'];
?>


<div class="recent-posts">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-12">
      <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-square', false, '' ); ?>

      <a href="<?php the_permalink(); ?>" class="post-thumbnail">
        <img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
      </a>
    </div>
    <div class="d-flex align-content-center flex-wrap col-md-6 col-sm-6 col-12">
      <div class="content">

        <?php if ($_categShow == '1') : ?>
        <span class="post-category">
          <?php the_category() ?>
        </span>
        <?php endif; ?>

        <?php if ($_postStyle == '1') : ?>

        <h4 class="entry-title pt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

        <div class="entry-meta">
          <span class="author vcard">
            <span>By</span><?php echo get_the_author(); ?>
          </span>
          <span class="posted-on line">
            <span>On</span><time class="entry-date published"
              datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
          </span>
        </div>

        <?php else : ?>

        <h4 class="entry-title py-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

        <?php endif; ?>

        <?php echo excerpt(25); ?>

        <?php if ($_postStyle !== '1') : ?>
        <div class="post-author">
          <div class="post-author-avatar">
            <?php  
                $user_id = get_the_author_meta('ID');
                echo get_avatar( $user_id, 40 ); 
            ?>
          </div>
          <div class="post-author-name">
            <?php echo get_the_author(); ?>
            <br>
            <time class="entry-date" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
          </div>
        </div>

        <?php endif; ?>
      </div>
    </div>
  </div>
</div>