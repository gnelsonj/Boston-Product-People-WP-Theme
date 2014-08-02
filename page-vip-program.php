<?php

/*
Template Name: LeadIn VIP Program
*/

if ( current_user_can('vip') )
{
    wp_redirect('/vip-settings');
    exit;
}

if ( isset($_POST['vip_company_name']) )
{
    $user_login = sanitize_title($_POST['vip_company_name']);
    $user_pass = $_POST['vip_password'];

    $user_data = array(
        'user_login'    => $user_login,
        'user_pass'     => $user_pass,
        'user_email'    => $_POST['vip_email'],
        'user_url'      => $_POST['vip_company_url'],
        'first_name'    => $_POST['vip_first_name'],
        'last_name'     => $_POST['vip_last_name'],
        'role'          => 'vip'
    );
    
    $errors = $user_id = wp_insert_user($user_data);

    if ( !is_wp_error($errors) ) 
    {
        add_user_meta($user_id, 'company_name', $_POST['vip_company_name']);
        add_user_meta($user_id, 'what_client_sites_are_you_using_leadin_on', $_POST['vip_clients']);

        $creds = array();
        $creds['user_login'] = $user_login;
        $creds['user_password'] = $user_pass;
        $creds['remember'] = TRUE;
        $user = wp_signon( $creds, FALSE );

        if ( is_wp_error($user) )
            echo $user->get_error_message();

        // @push contact to HubSpot

        $hs_context = array(
            'pageName' => 'VIP Signup'
        );

        $hs_context_json = json_encode($hs_context);
        $hs_form_guid =  "ab068f39-1e65-4c87-8c2f-58db8372598e";
        $hs_portal_id = "324680";

        //Need to populate these varilables with values from the form.
        $str_post = "email=" . urlencode($user_data['user_email'])
            . "&company=" . urlencode($_POST['vip_company_name'])
            . "&clients_on_leadin=" . urlencode($_POST['vip_clients'])
            . "&leadin_stage=VIP"
            . "&website=" . urlencode($user_data['user_url'])
            . "&firstname=" . urlencode($user_data['first_name'])
            . "&lastname=" . urlencode($user_data['last_name'])
            . "&hs_context=" . urlencode($hs_context_json);
        
        $endpoint = 'https://forms.hubspot.com/uploads/form/v2/' . $hs_portal_id . '/' . $hs_form_guid;
        
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $str_post);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = @curl_exec($ch);  //Log the response from HubSpot as needed.
        @curl_close($ch);

        wp_redirect( '/vip-settings' );
        exit();
    }
}

?>

<?php get_header("page"); ?>

<section class="page-section--teal page-section-vip-signup">
    
    <div class="content-inner">

        <div class="vip-signup__column-left">

            <h1 class="page-section__header">Grow Your WordPress Business as a LeadIn VIP</h1>
            <p>As a LeadIn <b>Very Important Partner</b> you'll get access to exclusive features and offers we're creating just for WordPress developers, consultants, and agencies, including:</p>
            <ul class="checklist">
                <li>Input into what features we build next</li>
                <li>Premium power-ups</li>
                <li>Premium support for you and your client's sites</li>
                <li>A listing in our preferred partners directory</li>
            </ul>
        </div>

        <div class="vip-signup__column-right">
        
            <div class="box--light">
                <form id="vip_form" name="vip_form" method="POST" action="">
                    <?php if ( is_wp_error($errors) ) : ?>
                        <p class="box--dark"><?php echo $errors->get_error_message(); ?></p>
                    <?php endif ?>
                    <label>Company name</label>
                    <input type="text" id="vip-company-name" name="vip_company_name" placeholder="Company name" value="<?php echo ( isset($_POST['vip_company_name']) ? stripslashes($_POST['vip_company_name']) : '' ); ?>" required />
                    
                    <label>Company website</label>
                    <input type="text" id="vip-company-url" name="vip_company_url" placeholder="Company website" value="<?php echo ( isset($_POST['vip_company_url']) ? stripslashes($_POST['vip_company_url']) : '' ); ?>" required />
                    
                    <label>Please list any client urls you're using LeadIn on currently</label>
                    <textarea type="text" id="vip-clients" name="vip_clients" placeholder="Client URLs"><?php echo ( isset($_POST['vip_clients']) ? stripslashes($_POST['vip_clients']) : '' ); ?></textarea>
                   
                    <label>First name</label>
                    <input type="text" id="vip-first-name" name="vip_first_name" placeholder="First name" value="<?php echo ( isset($_POST['vip_first_name']) ? stripslashes($_POST['vip_first_name']) : '' ); ?>" required />
                    
                    <label>Last name</label>
                    <input type="text" id="vip-last-name" name="vip_last_name" placeholder="Last name" value="<?php echo ( isset($_POST['vip_last_name']) ? stripslashes($_POST['vip_last_name']) : '' ); ?>" required />
                    
                    <label>Email</label>
                    <input type="text" id="vip-email" name="vip_email" placeholder="Email" value="<?php echo ( isset($_POST['vip_email']) ? stripslashes($_POST['vip_email']) : '' ); ?>" required />
                    
                    <label>Password</label>
                    <input type="password" id="vip-full-name" name="vip_password" placeholder="Password" value="<?php echo ( isset($_POST['vip_password']) ? $_POST['vip_password'] : '' ); ?>" required />
               
                    <input type="submit" name="vip_submit" value="Join the VIP Program" class="cta-button large" />
                </form>
            </div>
        
        </div>

    </div>

</section>


<?php get_footer("page"); ?>