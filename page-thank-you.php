<?php
/*
Template Name: Thank you page
*/

$catObj = get_category_by_slug('wordpress'); 

?>

<?php get_header("blog"); ?>



<div class="content thank-you-page">

    <div class="content-inner">

        <div class="page-section">
            <div class="blog-topic-header__inner">
                <h2 class="thank-you-page__header">Thanks for signing up!</h2>
                <h1 class="blog-topic-header__title">Do you also want to become a blogging expert?</h1>
                <div class="blog-topic-header__description">
                    <p>We’re opening up this course to WordPress users who want to learn how to improve their WordPress blogs.</p>
                      <h4>What you'll learn in this course:</h4>
                      <ul class="checklist">
                        <li>The fundamentals of WordPress</li>
                        <li>Blogging best practices</li>
                        <li>How to grow your audience</li>
                        <li>How to increase conversions</li>
                        <li>The best WordPress plugins</li>
                      </ul>
                </div>
                <div class="blog-topic-header__form">
                    <script charset="utf-8" src="//js.hsforms.net/forms/current.js"></script>
                    <script>
                        hbspt.forms.create({ 
                            portalId: '324680',
                            formId: 'c2f85232-89af-4ac8-a1c3-c48d63440d4b',
                            css: ' ',
                            submitButtonClass: 'cta-button large thank-you-page__cta'
                        });
                    </script>
                </div>
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
