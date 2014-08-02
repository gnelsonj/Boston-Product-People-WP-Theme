<?php
/*
Template Name: Plugin Directry Post Type
*/

$catObj = get_category_by_slug('wordpress');

global $wpdb;
global $post;

$q = $wpdb->prepare("SELECT * FROM repo_tags WHERE tag_slug = %s", str_replace('wordpress-', '', $post->post_name));
$tag_row = $wpdb->get_row($q);

$q = $wpdb->prepare("
    SELECT 
        rp.id, rp.name, rp.slug, rp.short_description, rp.requires, rp.tested, rp.num_ratings, rp.last_updated, rp.downloaded, rp.rating, rp.added, rp.tags, rp.sections
    FROM 
        repo_plugins rp, repo_tag_relationships rtr
    WHERE 
        rtr.tag_id = %d AND 
        rtr.plugin_id = rp.id
    ORDER BY rp.downloaded DESC LIMIT 20", $tag_row->tag_id
);

$plugins = $wpdb->get_results($q);

$all_tags = '';

foreach ( $plugins as $plugin )
{
    if ( ! $plugin->sections )
        continue;

    $sections = unserialize($plugin->sections);
    
    $placeholder_img_html = '<img src="' . get_template_directory_uri() . '/library/images/plugin_list_placeholder_image.png" alt="wordpress plugin placeholder">';
    if ( $sections )
    {
        preg_match_all('/<img[^>]+>/i',$sections['screenshots'], $result); 
        $plugin->screenshot = ( $result[0][0] ? $result[0][0] : $placeholder_img_html);
    }
    else
        $plugin->screenshot = $placeholder_img_html;

    $all_tags .= $plugin->tags . ',';

    $all_plugin_ids .= $plugin->id . ',';
}

$all_tags = str_replace(',,', ',', ltrim(rtrim(implode(',', array_keys(array_flip(explode(',', $all_tags)))), ', '), ', '));
$all_plugin_ids = rtrim($all_plugin_ids, ',');

$q = $wpdb->prepare("SELECT COUNT( rtr.tag_id ) AS num_tags, tag_slug, tag_text, rt.tag_id
FROM repo_tag_relationships rtr, repo_tags rt
WHERE rt.tag_id = rtr.tag_id AND
rt.tag_id IN ( $all_tags ) AND
rt.tag_id != %d AND 
rtr.plugin_id IN ( $all_plugin_ids ) 
GROUP BY rtr.tag_id
ORDER BY num_tags DESC", $tag_row->tag_id);

$sibling_tags = $wpdb->get_results($q);

?>

<?php get_header("blog"); ?>

    <div class="page-section--teal">
        <div class="content-inner">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <h1 class="page-section__header"><?php the_title(); ?> Plugins</h1>
                <p class="section-color"><?php
                    printf( __( 'Last Updated <time datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')));
                ?></p>

                <?php the_content(); ?>

            <?php endwhile; endif; ?>

        </div>
    </div>

    <div class="page-section">
        <div class="content-inner">

            <div class="plugin-directory__content">
                <h2><?php echo count($plugins); ?> Most Popular WordPress <?php echo ( strlen($tag_row->tag_text) <= 3 ? strtoupper($tag_row->tag_text) : ucwords($tag_row->tag_text) ); ?> Plugins</h2>
                <ul class="plugin-directory__list">
                    <?php foreach ( $plugins as $plugin ) : ?>
                        <li class="plugin-listing">
                            <div class="plugin-listing__image">
                                <?php echo $plugin->screenshot; ?>
                            </div>
                            <div class="plugin-listing__description">
                                <a href="<?php echo 'http://wordpress.org/plugins/' . $plugin->slug; ?>"><h3><?php echo $plugin->name; ?></h3></a>
                                <p><?php echo $plugin->short_description; ?></p>
                                <a class="cta-button" href="<?php echo 'http://wordpress.org/plugins/' . $plugin->slug; ?>">Download <?php echo $plugin->name; ?></a>
                            </div>
                            <div class="plugin-listing__metadata">
                                <table>
                                    <tr>
                                        <th>Downloads</th>
                                        <td><?php echo number_format($plugin->downloaded); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ratings</th>
                                        <td><?php echo number_format($plugin->num_ratings); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Average Rating</th>
                                        <td><?php echo number_format($plugin->rating/20, 2); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Launched</th>
                                        <td><?php echo date('M j, Y', strtotime($plugin->added)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated</th>
                                        <td><?php echo date('M j, Y', strtotime($plugin->last_updated)); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Requires</th>
                                        <td><?php echo $plugin->requires; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tested up to</th>
                                        <td><?php echo $plugin->tested; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                    <?php endforeach; ?>
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
                <br>
                <hr>
                <h5>Explore other popular WordPress plugins</h4>
                <ul>
                    <?php $i = 0;
                        foreach ( $sibling_tags as $sib_tag )
                        {
                            if ( count(get_page_by_title('WordPress ' . ucwords($sib_tag->tag_text), 'OBJECT', 'landing_page')) )
                                echo '<li><a href="' . 'wordpress-' . $sib_tag->tag_slug . '">WordPress ' . ( strlen($sib_tag->tag_text) <= 3 ? strtoupper($sib_tag->tag_text) : ucwords($sib_tag->tag_text) ) . '</a></li>';
                            
                            $i++;

                            if ( $i == 30 )
                                break;
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <?php get_template_part('section', 'testimonial-cta'); ?>

<?php get_footer(); ?>
