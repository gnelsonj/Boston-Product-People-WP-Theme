<?php
/*
Template Name: Home Page
*/
?>

<?php get_header('page'); ?>

<section class="page-section--teal page-header">
    <div class="content-inner">

        <div class="text-column">
            <h1 class="page-section__header">Get to know your website visitors</h1>
            <p>When someone submits a form on your WordPress site, you want to know more about them. What pages they've visited, when they return, and what social networks they’re on. Our WordPress marketing automation and lead tracking plugin gives you the details you need to make your next move. Because business isn’t business unless it’s personal.</p>
            <div class="testimonial">
                <p class="testimonial__quote">…the LeadIn plugin has been very useful so far in giving us an idea of the actual visitor paths to our contact forms vs. the paths we’ve intended.</p>
                <img class="testimonial__image" src="<?php echo get_template_directory_uri(); ?>/library/images/home/adam-w.jpg" alt="Adam W. Warner">
                <h5 class="testimonial__name">Adam W. Warner<br><a target="_blank" href="http://thewpvalet.com/wordpress-lead-tracking/">WP Valet</a></h5>
            </div>
            <a href="/download" class="cta-button large download-button-top">Get the free WordPress plugin</a>
            <br>
            <a href="/vip">Agency or Developer?</a>
        </div>

        <div class="image-column">
            <img class="screenshot" src="<?php echo get_template_directory_uri(); ?>/library/images/home/LeadIn_contact-timeline-hero@2x.png" alt="LeadIn CRM contact timeline">
        </div>

    </div>
</section>

<?php get_template_part('section', 'features-1'); ?>
<?php get_template_part('section', 'pricing'); ?>
<?php get_template_part('section', 'how'); ?>
<?php get_template_part('section', 'questions'); ?>
<?php get_template_part('section', 'testimonial-cta'); ?>

<?php get_footer("page"); ?>