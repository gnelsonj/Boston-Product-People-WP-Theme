<script type="text/javascript">
    jQuery(function(){
        mixpanel.track_links(".download-button-top", "Downloaded Plugin", {
            "pageview_url": document.URL,
            "cta_position": "top"
        });
        mixpanel.track_links(".download-button-bottom", "Downloaded Plugin", {
            "pageview_url": document.URL,
            "cta_position": "bottom"
        });
        mixpanel.track_links(".download-button-pricing", "Downloaded Plugin", {
            "pageview_url": document.URL,
            "cta_position": "pricing"
        });
        mixpanel.track_links(".download-button-contact", "Downloaded Plugin", {
            "pageview_url": document.URL,
            "cta_position": "contact us"
        });
        mixpanel.track("Page viewed",{
            "pageview_url": document.URL
        });

        mixpanel.track_forms("#vip_form", "VIP Sign Up");
        mixpanel.track_forms("#um_form_vip_settings", "VIP Settings Set");
    });
</script>