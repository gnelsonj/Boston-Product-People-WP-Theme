<?php get_header("page"); ?>

        <div class="content">

            <div class="content-inner">

                <div id="main" role="main">

                    <article id="post-not-found" class="hentry clearfix">

                        <header class="article-header">
                            <h1><?php _e( '404 - Article Not Found', 'bonestheme' ); ?></h1>
                        </header>

                        <section class="article-content">
                            <p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>

                            <section class="search">
                                <p><?php get_search_form(); ?></p>
                            </section>

                        </section>

                    </article>

                </div>

            </div>

        </div>

<?php get_footer(); ?>
