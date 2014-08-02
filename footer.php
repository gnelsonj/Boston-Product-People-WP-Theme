<footer class="footer">

    <div class="footer-inner">

        <nav class="footer__column">
            <a id="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logos/Leadin_logo_light.png" alt="leadin.com"></a>
        </nav>

        <nav class="footer__column" role="navigation">
            <a href="/blog">Blog</a>
            <a href="/dev-updates">User Updates</a>
            <a href="/learn-blogging">Learn Blogging</a>
            <a href="/vip">Agencies and Developers</a>
            <a href="/about">About</a>
        </nav>

        <nav class="footer__column">
            <a href="/browse-plugins">Browse WordPress Plugins</a>
            <a href="/mailchimp-list-sync/">MailChimp sync</a>
            <a href="/wordpress-subscribe-widget/">Subscribe popup widget</a>
            <a href="/content-analytics-plugin-wordpress/">Content analytics</a>
        </nav>
        
    </div>

</footer>

<?php // all js scripts are loaded in library/bones.php ?>
<?php wp_footer(); ?>

</body>

</html>



