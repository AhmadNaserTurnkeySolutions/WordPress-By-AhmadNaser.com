<?php get_header(); ?>
<div id="contentWrap">
    <div id="content">
        <?php if ( have_posts() ) : ?>
            <h2 id="pageTitle">Search Results</h2>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?>
                    </h2>
                    <div class="meta">
                        <em>Posted on:</em> <?php the_time('F jS, Y') ?>
                        <em>by</em> <?php the_author() ?>
                    </div>
                    <div class="entry">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
			<?php endwhile; ?>
        <?php else : ?>
            <h2>No results found</h2>
        <?php endif; ?>
    </div> <!-- end contentWrap -->
	<?php get_sidebar(); ?>
</div> <!-- end content -->
<?php get_footer(); ?>
