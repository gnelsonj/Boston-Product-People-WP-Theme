<?php
/*
Template Name: Learn page
*/

$catObj = get_category_by_slug('wordpress'); 

?>

<?php get_header("blog"); ?>

    <div class="page-section--teal">
        <div class="content-inner">
            <h1 class="blog-topic-header__title page-section__header">Do you want to become a WordPress blogging expert?</h1>
            <div class="blog-topic-header__description">
                <p>We’re opening up this course to WordPress users who want to learn how to improve their WordPress blogs.</p>
                  <h4>What you'll learn in this course:</h4>
                  <ul class="checklist">
                    <li>The fundamentals of WordPress</li>
                    <li>Blogging best practices</li>
                    <li>How to grow your audience</li>
                    <li>How to increase conversions</li>
                    <li>The best WordPress plugins</li>
                  </ul>
            </div>
            <div class="blog-topic-header__form">
                <script charset="utf-8" src="//js.hsforms.net/forms/current.js"></script>
                <script>
                    hbspt.forms.create({ 
                        portalId: '324680',
                        formId: '9d9bb899-e9fa-491e-9bfc-19e119f4cc11',
                        css: '',
                        submitButtonClass: 'cta-button large thank-you-page__cta'
                    });
                </script>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
