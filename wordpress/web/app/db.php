<?php
/*
Plugin Name: PostgreSQL for WordPress (PG4WP)
Plugin URI: https://github.com/PostgreSQL-For-Wordpress/postgresql-for-wordpress
Description: Database drop-in that lets this Bedrock app run with MySQL or PostgreSQL.
Version: 1.0.0
Author: Joey Gross
License: GPLv2 or newer
*/

$dbDriver = defined('DB_DRIVER') ? DB_DRIVER : (getenv('DB_DRIVER') ?: 'mysql');

if ($dbDriver !== 'pgsql') {
    return;
}

if (!defined('PG4WP_ROOT')) {
    if (!defined('DB_DRIVER')) {
        define('DB_DRIVER', $dbDriver);
    }

    if (!defined('PG4WP_DEBUG')) {
        define('PG4WP_DEBUG', false);
    }

    if (!defined('PG4WP_LOG_ERRORS')) {
        define('PG4WP_LOG_ERRORS', true);
    }

    $contentDir = defined('WP_CONTENT_DIR') ? WP_CONTENT_DIR : __DIR__;
    $candidates = [
        $contentDir . '/pg4wp',
        ABSPATH . 'wp-content/pg4wp',
        ABSPATH . 'wp-content/plugins/pg4wp',
        ABSPATH . 'pg4wp',
    ];

    foreach ($candidates as $candidate) {
        if (is_dir($candidate)) {
            define('PG4WP_ROOT', $candidate);
            break;
        }
    }

    if (!defined('PG4WP_ROOT')) {
        die('PG4WP file directory not found');
    }

    if (!defined('PG4WP_LOG')) {
        define('PG4WP_LOG', PG4WP_ROOT . '/logs/');
    }

    if ((PG4WP_DEBUG || PG4WP_LOG_ERRORS) && !file_exists(PG4WP_LOG) && is_writable(dirname(PG4WP_LOG))) {
        mkdir(PG4WP_LOG);
    }

    require_once PG4WP_ROOT . '/core.php';
}
