<?php
function check_server_ip_and_notify() {
    // List of allowed IP addresses
    $allowed_ips = array(
        '185.183.182.25',
        '185.189.27.20',
        '185.185.126.65',
        '185.183.182.10',
        '31.187.70.137',
        '185.183.182.222'
    );

    // Get the server's IP address
    $server_ip = $_SERVER['SERVER_ADDR'];

    // Get the site's public IP address
    $public_ip = file_get_contents('https://api.ipify.org');

    // Check if the server's IP is not in the allowed list
    if (!in_array($server_ip, $allowed_ips)) {
        // Email details
        $to = 'web@searchkingsafrica.com, thando@searchkingsafrica.com';
        $subject = 'Customer Server IP Address Alert';
        $message = "The WordPress site is currently hosted on an unrecognized IP address.\n\n";
        $message .= "Server IP: {$server_ip}\n";
        $message .= "Public IP: {$public_ip}\n\n";
        $message .= "Please investigate this immediately.";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        // Send email
        wp_mail($to, $subject, $message, $headers);
    }
}

// Hook the function to run daily
if (!wp_next_scheduled('check_server_ip_daily')) {
    wp_schedule_event(time(), 'daily', 'check_server_ip_daily');
}
add_action('check_server_ip_daily', 'check_server_ip_and_notify');
