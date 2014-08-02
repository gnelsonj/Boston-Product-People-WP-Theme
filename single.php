<?php get_header('base'); ?>
    
    <?php get_header("blog"); ?>

    <div class="content">

        <div class="content-inner">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php $category = get_the_category(); ?>
                
                <article id="post post-<?php the_ID(); ?>" class="article" itemprop="articleBody" role="article" itemscope itemtype="http://schema.org/BlogPosting">

                    <section class="blog__content page-section">
            
                        <h4 class="blog__category"><?php echo $category[0]->cat_name; ?></h4>

                        <h1 class="article-title" itemprop="headline"><?php the_title(); ?></h1>
                        
                        <p class="byline">
                            <span class="author"><?php echo get_the_author(); ?></span>
                            <span class="date">Posted this on <time class="updated" datetime="<?php echo get_the_time('Y-m-j') ?>" pubdate><?php echo get_the_time(get_option('date_format'))?></time></span>
                        </p>

                        <div class="blog__sidebar">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
                        </div>

                        <div class="the-content">
                            <?php the_content(); ?>
                        </div>

                    </section>
        
                    <footer class="blog__footer page-section">

                        <?php if ( $category[0]->slug == 'dev' or $category[0]->slug == 'vip' ) : ?>
                            
                            <p><?php get_template_part('include', 'follow-button'); ?></p>
                            
                            <p>Love LeadIn?&nbsp;<a href="http://wordpress.org/support/view/plugin-reviews/leadin?rate=5#postform">leave us a review</a></p>

                            <p><a href="<?php echo get_category_link( $category[0]->cat_ID ); ?>">read more <?php echo $category[0]->cat_name; ?></a></p>              

                        <?php else : ?>

                            <div class="blog__share-buttons">
                                <p><?php get_template_part('include', 'share-buttons'); ?></p>
                            </div>
                                
                            <div class="blog__author-box">
                                <div class="box--light">
                                    <h3><?php echo get_the_author(); ?></h3>
                                    <p><?php the_author_description(); ?></p>
                                    <p><a href="http://twitter.com/<?php the_author_meta('twitter'); ?>">Twitter</a> - <a href="<?php the_author_meta('googleplus'); ?>">Google Plus</a> - <a href="<?php the_author_meta('linkedin'); ?>">LinkedIn</a></p>    
                                </div>
                            </div>

                            <div class="blog__leadin-description">
                                <div class="box--light">
                                    <h3><a id="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logos/Leadin_logo_new.png" alt="leadin.com"></a></h3>
                                    <p>LeadIn is the easy way to get to know your website visitors with <a href="/">marketing automation for WordPress</a>.</p>
                                    <br>
                                    <?php get_template_part('include', 'follow-button'); ?>
                                </div>
                            </div>

                            <div class="blog__bottom-cta">
                                <div class="blog-post-bottom-cta-inner">
                                    <h2>Get WordPress insights every Wednesday</h2>
                                    <p><?php echo category_description( get_category_by_slug('wordpress')->term_id ); ?></p>
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

                        <?php endif; ?>

                        <div class="blog__article-comments">
                            <?php get_template_part('include', 'disqus'); ?>
                        </div>

                    </footer>

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

<?php get_footer(); ?>