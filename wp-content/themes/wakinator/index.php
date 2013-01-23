<?php get_header(); the_post(); ?>
         
        <div class="content-container">
            <h4><?php the_title(); ?></h4>

            <?php the_content(); ?>
        </div><!-- #content -->
             
<?php get_footer(); ?>
