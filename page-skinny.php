<?php
/*
Template Name: Skinny Page
*/
?>

<?php get_header("page"); ?>

    <div class="page-section">

        <div class="content-inner">

            <div id="main" class="skinny" role="main">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

                        <header class="page-header">
                            <h1 class="page-title single-title" itemprop="headline"><?php the_title(); ?></h1>
                        </header>

                        <section class="article-content" itemprop="articleBody">
                            <?php the_content(); ?>
                        </section>

                    </article>

                <?php endwhile; ?>

                <?php else : ?>

                    <article id="post-not-found" class="hentry">
                        <header class="article-header">
                            <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                        </header>

                        <section class="article-content">
                            <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                        </section>
                        
                        <footer class="article-footer">
                                <p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
                        </footer>
                    </article>

                <?php endif; ?>

            </div>

        </div>

    </div>

<?php get_footer(); ?>
