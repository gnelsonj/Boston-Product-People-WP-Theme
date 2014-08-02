<?php
/*
Template Name: Dev Blog
*/

?>

<?php get_header('page'); ?>

<div class="page-section dev-blog">

    <div class="content-inner">

        <div class="blog-post-list">

            <h1>User Updates</h1>

            <?php

                $args = array( 'category_name' => 'dev' );

                $myposts = get_posts( $args );

                foreach ( $myposts as $post ) : setup_postdata( $post );

            ?>
            
            <article class="blog-article">
                <a href="<?php the_permalink(); ?>"><h2 class="dev-blog__article-title"><?php the_title(); ?></h2></a>
                <p class="dev-blog__byline">
                    <span class="dev-blog__author"><?php echo get_the_author(); ?> </span>
                    <span class="dev-blog__date">Posted this on <time class="updated" datetime="<?php echo get_the_time('Y-m-j') ?>" pubdate><?php echo get_the_time(get_option('date_format')); ?></time></span> 
                </p>
            </article>

            <?php
                endforeach; 
                wp_reset_postdata();
            ?>
        </div>

    </div>

</div>

<?php get_footer(); ?>