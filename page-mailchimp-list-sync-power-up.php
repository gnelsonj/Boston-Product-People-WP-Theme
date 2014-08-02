<?php
/*
Template Name: MailChimp List Sync
*/
?>

<?php get_header("page"); ?>

    <div class="content" class="subscribe">

        <section class="page-section--teal page-header">
            
            <div class="content-inner">

                <div class="text-column">
                    <h1>Email List Sync for WordPress</h1>
                    <p>Keep your LeadIn Subscribers and mailing lists in sync. LeadIn automatically adds your new subscribers to an ESP of your choice.</p>
                    <a href="/download" class="cta-button large download-button-top">Get the free WordPress plugin</a>
                </div>

                <div class="image-column">
                    <img class="screenshot" src="<?php echo get_template_directory_uri(); ?>/library/images/home/esp-sync.png" alt="LeadIn ESP Sync">
                </div>
            </div>

        </section>

        <?php get_template_part('section', 'questions'); ?>
        <?php get_template_part('section', 'features-1'); ?>
        <?php get_template_part('section', 'pricing'); ?>
        
    </div>

<?php get_footer("page"); ?>