<?php
/*
Template Name: Blog
*/

$catObj = get_category_by_slug('wordpress'); 

?>

<?php get_header("blog"); ?>

<div class="page-section--teal">
    <div class="content-inner">
        <div class="blog-topic-header__inner">
            <h1 class="blog-topic-header__title section-color">Get WordPress insights every Wednesday</h1>
            <p class="blog-topic-header__description"><?php echo $catObj->description; ?></p>
            <div class="blog-topic-header__form">
                <script charset="utf-8" src="//js.hsforms.net/forms/current.js"></script>
                <script>
                    hbspt.forms.create({ 
                        portalId: '324680',
                        formId: 'a06f5dc5-9a33-49e2-b9a6-35a9db1199d4',
                        css: ' ',
                        submitButtonClass: 'button'
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<div class="page-section">
    <div class="content-inner">
        <div class="blog-post-list">
            <?php

            $args = array( 'category_name' => 'wordpress', 'posts_per_page' => '50' );

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
