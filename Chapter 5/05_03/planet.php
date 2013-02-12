<?php
/*
Template Name: Planet
*/
?>
<?php get_header(); ?>
<div id="contentWrap">
    <div id="content">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?>
                    </h2>
                    <div class="meta">
                        <?php the_time('F jS, Y') ?>
                    </div>
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                    <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
                </article>
			<?php endwhile; ?>
        <?php else : ?>
            <h2>Not Found</h2>
        <?php endif; ?>
    </div> <!-- end contentWrap -->
<?php get_sidebar(); ?>
</div> <!-- end content -->
<?php get_footer(); ?>
