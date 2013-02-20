<?php
    require_once('../wp-load.php');
    
    define('SPACER', '&nbsp;&nbsp;&nbsp;');
    define('PAD',    20);
    define('BR',     '<br>');
    define('THANK_YOU_PAGE', '/contact/thanks');

    if (!wp_verify_nonce($_POST['_wpnonce'], 'tw_contact')) {
        wp_redirect(site_url($failed.'?se=1'.$failed_extra)); 
        die();
    }    
    
    $_POST['con-fullname'] = filter_var($_POST['con-fullname'], FILTER_SANITIZE_STRING);
    $_POST['con-email']    = filter_var($_POST['con-email'],    FILTER_SANITIZE_EMAIL);
    $_POST['con-subject']  = filter_var($_POST['con-subject'],  FILTER_SANITIZE_STRING);
    $_POST['con-message']  = filter_var($_POST['con-message'],  FILTER_SANITIZE_STRING);

    $headers[] = "From: ".$_POST['con-email']." <".$_POST['con-email'].">\r\n";

    $body = '';
    $body .= '-----------------------------------------------------'.BR;
    $body .= 'Website Contact Submission'.BR;
    $body .= '-----------------------------------------------------'.BR;
    $body .= BR;
    $body .= '<strong>Contact Details</strong>'.BR;
    $body .= SPACER.str_pad('Full Name: ', PAD).$_POST['con-fullname'].BR;
    $body .= SPACER.str_pad('Email Address: ', PAD).$_POST['con-email'].BR;
    $body .= SPACER.str_pad('Message: ', PAD).BR;
    $body .= $_POST['con-message'].BR;
    $body .= BR;

    add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));    
    $mail_sent = wp_mail('ts@daxiangroup.com', 'Website Contact: '.$_POST['con-subject'], $body, $headers);
    
    header('Location: '.THANK_YOU_PAGE);
    die();
