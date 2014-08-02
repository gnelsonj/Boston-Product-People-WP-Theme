<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <?php // Google Chrome Frame for IE ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <?php if ( $post->post_name != 'browse-plugins' ) : ?>
        <title><?php wp_title('') ? wp_title('') : the_title(); ?></title>
    <?php else : ?>
        <?php $browse_by = strtoupper(get_query_var('plugin_char')); ?>
        <title><?php echo 'Browse Plugins' . ( $browse_by ? ' - ' . $browse_by : '' ); ?></title>
    <?php endif; ?>

    <?php // mobile meta (hooray!) ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
    <?php get_template_part('include', 'favicons'); ?>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php // wordpress head functions ?>
    <?php wp_head(); ?>
    <?php // end of wordpress head ?>

    <!-- Typekit -->
    <script type="text/javascript" src="//use.typekit.net/zwn8aqx.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-46791835-1', 'leadin.com');
      ga('send', 'pageview');
    </script>

    <!-- HubSpot -->
    <script type="text/javascript">
        (function(d,s,i,r) {
            if (d.getElementById(i)){return;}
            var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
            n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/324680.js';
            e.parentNode.insertBefore(n, e);
        })(document,"script","hs-analytics",300000);
    </script>

</head>

<body <?php body_class(); ?>>