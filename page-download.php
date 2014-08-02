<?php
/*
Template Name: Download Page
*/
?>

<?php get_header('plain'); ?>

    <div class="content" class="page-download">

        <div class="content-inner">
            <div class="page-section page-header page-header-setup">

                <h1 class="page-title">Start tracking in 5 minutes</h1>

                <div class="step">
                    <img class="step-image" src="<?php echo get_template_directory_uri(); ?>/library/images/install1.png" alt="LeadIn installation step 1.">
                    <h4 class="step-title">1. Download the WordPress plugin</h4>
                    <p class="step-description">Your download should begin automatically. <strong>Don't unzip the file!</strong> If the download doesn't begin automatically, <a href="http://downloads.wordpress.org/plugin/leadin.zip">Click here</a>.</p>
                </div>

                <div class="step">
                    <img class="step-image" src="<?php echo get_template_directory_uri(); ?>/library/images/install2.png" alt="LeadIn installation step 2.">
                    <h4 class="step-title">2. Upload the plugin</h4>
                    <p class="step-description">In your WordPress Admin, navigate to plugins > add new > upload. Click “Choose File” and navigate to the leadin.zip file you just downloaded.</p>
                </div>

                <div class="step">
                    <img class="step-image" src="<?php echo get_template_directory_uri(); ?>/library/images/install3.png" alt="LeadIn installation step 3.">
                    <h4 class="step-title">3. Activate the plugin</h4>
                    <p class="step-description">Follow the popup link to the LeadIn settings page, confirm your email and you’re done!</p>
                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript">
        jQuery( document ).ready(function( $ ) {
            setTimeout(function() {
                window.location.href = 'http://downloads.wordpress.org/plugin/leadin.zip';
            }, 500);
        });
    </script>

<?php get_footer("plain"); ?>
