<?php

/*
Template Name: LeadIn VIP Settings
*/

?>

<?php get_header("page"); ?>

<section class="page-section page-header">

    <div class="content-inner">

        <div id="main" class="skinny" role="main">
            <h1>VIP Settings</h1>
            <?php if ( current_user_can('vip') ) : ?>
                <div class="box--dark">
                    <p>Thanks for signing up, we'll be in touch soon!</p>
                    <p>In the meantime, You can check out our previous VIP updates:</p>
                    <ul>
                        <?php
                            $args = array( 'category_name' => 'vip', 'posts_per_page' => '50' );

                            $myposts = get_posts( $args );

                            foreach ( $myposts as $post ) : setup_postdata( $post );
                        ?>
                            
                        <li class="blog-article">
                            <a href="<?php the_permalink(); ?>"><h2 class="blog-article__title"><?php the_title(); ?></h2></a>
                            <p class="blog-article__meta">
                                <?php printf( __( 'Posted on %1$s', 'bonestheme' ), get_the_time( get_option('date_format'))); ?>
                            </p>
                            <?php the_excerpt(); ?>
                        </li>

                        <?php endforeach; 
                            wp_reset_postdata();
                        ?>
                    </ul>
                </div>
                <br>
                <h2>Your Settings</h2>
                <?php echo do_shortcode('[user-meta type="profile" form="vip_settings"]'); ?>
            <?php else : ?>
                <p>Please <a href="/login">log in</a> to view your settings</p>
            <?php endif; ?>
        </div>

    </div>

</section>

<?php get_footer("page"); ?>