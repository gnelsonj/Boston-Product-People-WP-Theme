<?php
/*
Template Name: Browse Plugins
*/

global $wpdb;

$browse_by = strtoupper(get_query_var('plugin_char'));
if ( $browse_by )
{
    $q = $wpdb->prepare("SELECT post_name, post_title FROM wp_posts WHERE post_type = 'landing_page' AND post_status = 'publish' AND post_title LIKE '%%%s%%' ORDER BY post_title", 'WordPress ' . $browse_by);
    $landing_pages = $wpdb->get_results($q);
}
?>

<?php get_header("blog"); ?>

    <div class="page-section--teal">
        <div class="content-inner">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <h1 class="page-section__header"><?php echo get_the_title() . ( $browse_by ? ' - ' . $browse_by : '' ); ?></h1>
                <p class="section-color"><?php
                    printf( __( 'Last Updated <time datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')));
                ?></p>

                Explore the most downloaded WordPress plugins for each popular category.

            <?php endwhile; endif; ?>

        </div>
    </div>

    <div class="page-section">
        <div class="content-inner">
            <div class="plugin-directory__content">
                <p>
                    Browse by - 
                    <?php
                        $alphas = range('A', 'Z');
                        foreach ( $alphas as $alpha )
                        {
                            if ( $alpha != $browse_by )
                                echo '<a style="padding: 0px 6px 0px 0px;" href="/browse-plugins/' . strtolower($alpha) . '">' . $alpha . '</a>';
                            else
                                echo '<span style="padding: 0px 6px 0px 0px; font-weight: bold;">' . $alpha . '</span>';
                        }
                    ?>
                </p>

                <ul class="plugin-directory__list">
                    <?php if ( $browse_by ) : ?>
                        <?php foreach ( $landing_pages as $key => $landing_page ) : ?>
                            <li class="">
                                <a href="<?php echo '/plugins/' . $landing_page->post_name; ?>"><?php echo $landing_page->post_title; ?></a><br/>
                            </li> 
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h3>Popular Plugin Categories</h3>
                        <li>
                            <a href="/plugins/wordpress-lead-tracking">WordPress Lead Tracking</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-crm">WordPress CRM Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-analytics">WordPress Analytics Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-popup">WordPress Popup Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-email">WordPress Email Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-form-builder">WordPress Form Builder Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-mailchimp">WordPress MailChimp Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-constant-contact">WordPress Constant Contact Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-leads">WordPress Leads Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-lead-generation">WordPress Lead Generation Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-visitor-tracking">WordPress Visitor Tracking Plugins</a>
                        </li>
                        <li>
                            <a href="/plugins/wordpress-keywords">WordPress Keywords Plugins</a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
            <div class="plugin-directory__sidebar">
                <div class="plugin-directory__cta box--green">
                    <h3>Avoid common blogging mistakes</h3>
                    <p>We've complied examples from the world's top bloggers to help you improve your blog.</p>
                    <script charset="utf-8" src="//js.hsforms.net/forms/current.js"></script>
                    <script>
                      hbspt.forms.create({ 
                        portalId: '324680',
                        formId: '9d9bb899-e9fa-491e-9bfc-19e119f4cc11',
                        css: ' ',
                        submitButtonClass: 'cta-button'
                      });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('section', 'testimonial-cta'); ?>

<?php get_footer(); ?>
