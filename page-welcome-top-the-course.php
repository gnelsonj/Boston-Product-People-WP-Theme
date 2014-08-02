<?php
/*
Template Name: Welcome to the course
*/

$catObj = get_category_by_slug('wordpress'); 

?>

<?php get_header("blog"); ?>



<div class="content thank-you-page">

    <div class="content-inner">

        <div class="page-section">
            <div class="blog-topic-header__inner">
                <h2 class="thank-you-page__header">Welcome to the course</h2>
                <h1 class="blog-topic-header__title">Check your email!</h1>
            </div>
        </div>

        <div class="page-section blog-post-list">
            
            <h2 class="page-section__header">Read our recent posts</h2>
            
            <?php

            $args = array( 'category_name' => 'wordpress' );

            $myposts = get_posts( $args );

            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            
                <article class="blog-article">
                    <a href="<?php the_permalink(); ?>"><h2 class="blog-article__title"><?php the_title(); ?></h2></a>
                    <p class="blog-article__meta">
                        <?php printf( __( 'by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') ); ?>
                    </p>
                    <?php the_excerpt(); ?>
                </article>

            <?php endforeach; 
                wp_reset_postdata();
            ?>
        </div>

    </div>

</div>

<?php get_footer(); ?>
