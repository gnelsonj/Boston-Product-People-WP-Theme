<?php
/*
Template Name: Analytics Page
*/
?>

<?php get_header("page"); ?>

    <div class="content" class="subscribe">

       <section class="page-section--teal page-header">

            <div class="content-inner">

                <div class="text-column">
                    <h1>Content Analytics plugin for WordPress</h1>
                    <p>What's the best converting content on your website? How about the best converting source of traffic? If you're using Google Analytics for WordPress, you likely have to spend hours setting up custom reports to get this data. With our free WordPress plugin LeadIn, this type of tracking is easy. Just simple, actionable content analytics with no complicated set up.</p>
                    <a href="/download" class="cta-button large download-button-top">Get the free WordPress plugin</a>
                </div>

                <div class="image-column">
                    <a href="<?php echo get_template_directory_uri(); ?>/library/images/analytics-preview.png" target="_blank"><img class="screenshot" src="<?php echo get_template_directory_uri(); ?>/library/images/analytics-preview.png" alt="LeadIn content analytics"></a>
                </div>
                
            </div>

        </section>
        
        <?php get_template_part('section', 'features-1'); ?>
        <?php get_template_part('section', 'pricing'); ?>
        <?php get_template_part('section', 'questions'); ?>

    </div>

<?php get_footer("page"); ?>