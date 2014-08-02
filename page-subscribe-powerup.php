<?php
/*
Template Name: Subscribe Page
*/
?>

<?php get_header("page"); ?>

    <div class="content" class="home subscribe">

        <section class="page-section--teal page-header">

            <div class="content-inner">
                
                <div class="text-column">
                    <h1>WordPress Subscribe Widget</h1>
                    <p>If you're not actively trying to grow your email list, you're missing out on a huge opportunity to reach your audience. Stop letting potential subscribers slip through the cracks. Convert more visitors to subscribers with the LeadIn popup subscribe form plugin.</p>
                    <div class="subscribe-controls">
                        <p class="subscribe-controls__label">Pick from multiple display options:</p>
                        <label class="radio">
                            <input class="cta-position-selector" type="radio" name="positionRadios" id="positionRadios1" value="<?php echo get_template_directory_uri(); ?>/library/images/subscribe-demo-popover@2x.png" checked="">
                            Popup
                        </label>
                        <label class="radio">
                            <input class="cta-position-selector" type="radio" name="positionRadios" id="positionRadios2" value="<?php echo get_template_directory_uri(); ?>/library/images/subscribe-demo-top@2x.png">
                            Top
                        </label>
                        <label class="radio">
                            <input class="cta-position-selector" type="radio" name="positionRadios" id="positionRadios2" value="<?php echo get_template_directory_uri(); ?>/library/images/subscribe-demo-bottom@2x.png">
                            Bottom Right
                        </label>
                    </div>
                    <a href="/download" class="cta-button large download-button-top">Get the free WordPress plugin</a>
                </div>

                <div class="image-column">
                    <div class="subscribe-demo">
                        <div class="browser-toolbar">
                            <div class="url-input">
                                <span class="url">www.leadin.com</span>
                                <span class="browser-button">&rsaquo;</span>
                                <span class="browser-button">&lsaquo;</span>
                            </div>
                        </div>
                        <div class="browser-content">
                            <img class="subscribe-demo--image" src="<?php echo get_template_directory_uri(); ?>/library/images/subscribe-demo-popover@2x.png">
                        </div>
                    </div>
                </div>
                
            </div>

        </section>

        <?php get_template_part('section', 'questions'); ?>
        <?php get_template_part('section', 'features-1'); ?>
        <?php get_template_part('section', 'pricing'); ?>

    </div>

    <script type="text/javascript">
        
        function switchDemoImage(ctaPosition) {
            console.log(ctaPosition);
            jQuery('.subscribe-demo--image').attr("src", ctaPosition);
        }

        jQuery( document ).ready(function( $ ) {

            $('.cta-position-selector').on('click', function(){
                switchDemoImage($(this).val());
            });

        });

    </script>

<?php get_footer("page"); ?>