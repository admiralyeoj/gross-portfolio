<?php
/**
 * Configuration - WP Offload Media Lite
 * @url: https://wordpress.org/plugins/amazon-s3-and-cloudfront/
 */
if (!empty(getenv('AS3CF_URL'))) {

  $env = sscanf(getenv('AS3CF_URL'), 's3://%[^:]:%[^@]@s3-%[^.].amazonaws.com/%s');

  define('AS3CF_PROVIDER', 'aws');
  define('AS3CF_REGION', $env[2]);
  define('AS3CF_BUCKET', $env[3]);

  define( 'AS3CF_SETTINGS', serialize( array(
    'provider' => 'aws',
    'access-key-id' => $env[0],
    'secret-access-key' =>  $env[1],
  ) ) );

}