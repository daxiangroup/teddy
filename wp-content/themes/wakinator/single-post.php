<?php get_header(); the_post(); ?>

        <div class="content-container">
            <h4><?php the_title(); ?></h4>

            <div id="nav-above" class="navigation"><?php tw_post_navigation(); ?></div>

            <?php the_content(); ?>
        </div><!-- #content -->
             
<?php get_footer(); ?>