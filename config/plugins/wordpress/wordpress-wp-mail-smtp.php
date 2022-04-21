<?php
/**
 * Configuration - Plugin: WP Mail SMTP by WPForms
 * @url: https://wordpress.org/plugins/wp-mail-smtp/
 */

define('WPMS_ON', true);

 if (!empty(getenv('SENDGRID_API_KEY'))) {

    define('WPMS_MAILER', 'sendgrid');
    define( 'WPMS_SENDGRID_API_KEY', getenv('SENDGRID_API_KEY') );
}
