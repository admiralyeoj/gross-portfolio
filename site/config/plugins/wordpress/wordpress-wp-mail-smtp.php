<?php
/**
 * Configuration - Plugin: WP Mail SMTP by WPForms
 * @url: https://wordpress.org/plugins/wp-mail-smtp/
 */



 if (!empty(getenv('SENDGRID_API_KEY'))) {

    define( 'WPMS_ON', true );

    define( 'WPMS_LICENSE_KEY', env('WPMS_LICENSE_KEY') ); 
    define( 'WPMS_MAIL_FROM', env('MAIL_FROM') );
    define( 'WPMS_MAIL_FROM_FORCE', true );
    define( 'WPMS_MAIL_FROM_NAME', getenv('MAIL_FROM_NAME') );
    define( 'WPMS_MAIL_FROM_NAME_FORCE', true ); 
    define( 'WPMS_MAILER', 'sendgrid' );

    define('WPMS_MAILER', 'sendgrid');
    define( 'WPMS_SENDGRID_DOMAIN', '' );
    define( 'WPMS_SENDGRID_API_KEY', getenv('SENDGRID_API_KEY') );
}
