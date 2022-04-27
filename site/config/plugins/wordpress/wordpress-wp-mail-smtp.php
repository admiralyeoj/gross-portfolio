<?php
/**
 * Configuration - Plugin: WP Mail SMTP by WPForms
 * @url: https://wordpress.org/plugins/wp-mail-smtp/
 */

// define('WPMS_ON', true);

/* if (!empty(getenv('SENDGRID_USERNAME')) && !empty(getenv('SENDGRID_PASSWORD'))) {
    // Auth method ('credentials')
    
    define('WPMS_MAILER', 'smtp');
    
    define( 'WPMS_SMTP_HOST', 'smtp.sendgrid.net' ); // The SMTP mail host.
    define( 'WPMS_SMTP_PORT', 587 ); // The SMTP server port number.
    define( 'WPMS_SSL', 'tls' ); // Possible values '', 'ssl', 'tls' - note TLS is not STARTTLS.
    define( 'WPMS_SMTP_AUTH', true ); // True turns it on, false turns it off.
    define( 'WPMS_SMTP_USER', getenv('SENDGRID_USERNAME') ); // SMTP authentication username, only used if WPMS_SMTP_AUTH is true.
    define( 'WPMS_SMTP_PASS', getenv('SENDGRID_PASSWORD') ); // SMTP authentication password, only used if WPMS_SMTP_AUTH is true.
    define( 'WPMS_SMTP_AUTOTLS', true ); // True turns it on, false turns it off.
} else if (!empty(getenv('SENDGRID_API_KEY'))) {

    define('WPMS_MAILER', 'sendgrid');
    define( 'WPMS_SENDGRID_API_KEY', getenv('SENDGRID_API_KEY') );
} */
