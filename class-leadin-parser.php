<?php

//=============================================
// WPLeadInParser Class
//=============================================
class WPLeadInParser {
    
    var $api_url = '';
    var $plugin_slug = '';
    var $readme;

    /**
     * Class constructor
     */
    function __construct ()
    {
        $this->api_url = 'http://leadin.com/plugins/index.php';
        $this->plugin_slug = 'leadin';

        //=============================================
        // Hooks & Filters
        //=============================================

        $this->check_for_plugin_update();
    }
    
    //=============================================
    // Update API
    //=============================================

    /**
     * Adds setting link for LeadIn to plugins management page 
     *
     * @param   array $checked_data     plugins that have updates
     * @return  array
     */
    function check_for_plugin_update ( ) 
    {
        //Comment out these two lines during testing.
        //if ( empty($checked_data->checked) )
            //return $checked_data;
        
        $args = array(
            'slug' => $this->plugin_slug,
            'version' => 'leadin/leadin.php',
        );

        $request_string = array(
                'body' => array(
                    'action' => 'basic_check', 
                    'request' => serialize($args),
                    'api-key' => md5(get_bloginfo('url'))
                ),
                'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
            );
        
        // Start checking for an update
        $raw_response = wp_remote_post($this->api_url, $request_string);

        if ( !is_wp_error($raw_response) && ($raw_response['response']['code'] == 200) )
            $response = unserialize($raw_response['body']);

        if ( is_object($response) && !empty($response) ) // Feed the update data into WP updater
        {
            $this->readme = (object)NULL;
            $this->readme->current_version = $response->version;
            $this->readme->last_updated = $response->date;
            $this->readme->plugin_authors = $response->author;
            $this->readme->required_wp_version = $response->requires;
            $this->readme->tested_wp_version = $response->tested;
            $this->readme->homepage = $response->homepage;
            $this->readme->num_downloads = $response->downloaded;
            $this->readme->download_url = 'http://www.leadin.com/plugins/update' . $response->file_name;
            $this->readme->section_description = $response->sections['description'];
            $this->readme->section_installation = $response->sections['installation'];
            $this->readme->section_screenshots = $response->sections['screenshots'];
            $this->readme->section_faq = $response->sections['faq'];
            $this->readme->section_changelog = $response->sections['changelog'];
        } 
    }
}

?>