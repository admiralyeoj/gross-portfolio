<?php
/**
 * Configuration - Plugin: WP Mail SMTP by WPForms
 * @url: https://wordpress.org/plugins/wp-mail-smtp/
 */

define('WPMS_ON', true);


if (!empty(getenv('WPMS_MAIL_FROM'))) {
    define( 'WPMS_MAIL_FROM_FORCE', true );
    define('WPMS_MAIL_FROM', getenv('WPMS_MAIL_FROM'));
}

if(getenv('WPMS_MAILER') === 'sendgrid') {
    define('WPMS_MAILER', getenv('WPMS_MAILER'));	
    define( 'WPMS_SENDGRID_DOMAIN', getenv('WPMS_SENDGRID_DOMAIN') );
    define( 'WPMS_SENDGRID_API_KEY', getenv('WPMS_SENDGRID_API_KEY') );
} else if(getenv('WPMS_MAILER') === 'mailgun') {	
    define( 'WPMS_MAILGUN_API_KEY', getenv('WPMS_MAILGUN_API_KEY') );
    define( 'WPMS_MAILGUN_DOMAIN', getenv('WPMS_MAILGUN_DOMAIN') );
    define( 'WPMS_MAILGUN_REGION', 'US' );
    define( 'WPMS_MAILER', 'mailgun' );
}