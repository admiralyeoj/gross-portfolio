<?php
/**
* Configuration - Plugin: Redis
* @url: https://wordpress.org/plugins/redis-cache/
*/
if (!empty(getenv('REDIS_URL'))) {
    $env = parse_url(getenv('REDIS_URL'));

    if (!empty($env['host'])) {
        define('WP_CACHE', true);
        define('WP_REDIS_DISABLED', false);
        define('WP_REDIS_CLIENT', 'predis');
        define('WP_REDIS_SCHEME', $env['scheme'] ?? 'tcp');
        define('WP_REDIS_HOST', $env['host']);
        define('WP_REDIS_PORT', $env['port'] ?? 6379);

        if (isset($env['pass'])) {
            define('WP_REDIS_PASSWORD', $env['pass']);
        }

        $database = isset($env['path']) ? trim($env['path'], '/') : '';
        if ($database !== '' && ctype_digit($database)) {
            define('WP_REDIS_DATABASE', (int) $database);
        }

        $prefix = getenv('REDIS_PREFIX');
        if ($prefix !== false && $prefix !== '') {
            define('WP_REDIS_PREFIX', $prefix);
        } elseif (!empty(getenv('APP_NAME'))) {
            define('WP_REDIS_PREFIX', sanitize_key(getenv('APP_NAME')) . ':');
        }

        // 28 Days
        define('WP_REDIS_MAXTTL', 2419200);
    }

    unset($env);
}
