client_max_body_size 500M;

real_ip_header X-Forwarded-For;
set_real_ip_from  10.0.0.0/8;
server_tokens off;
fastcgi_hide_header X-Powered-By;
fastcgi_hide_header X-Pingback;
add_header X-Frame-Options "SAMEORIGIN";
access_log off;

charset utf8;

gzip                on;
gzip_vary           on;
gzip_proxied        any;
gzip_types          *;

index index.php;

# Global restrictions configuration file.
location = /robots.txt {
	allow all;
	log_not_found off;
	access_log off;
}

# Deny all attempts to access hidden files such as .htaccess, .htpasswd, .DS_Store (Mac).
# Keep logging the requests to parse later (or to pass to firewall utilities such as fail2ban)
location ~ /\. {
	deny all;
}

# Deny access to any files with a .php extension in the uploads directory
# Works in sub-directory installs and also in multisite network
# Keep logging the requests to parse later (or to pass to firewall utilities such as fail2ban)
location ~* /(?:uploads|files)/.*\.php$ {
	deny all;
}

location /wp-content/ {
	root "<?=getenv("HEROKU_APP_DIR")?>";
}

# WordPress single site rules.
# Designed to be included in any server {} block.

# This order might seem weird - this is attempted to match last if rules below fail.
# http://wiki.nginx.org/HttpCoreModule
location / {
	try_files $uri $uri/ /index.php?$args;
}

# Add trailing slash to */wp-admin requests.
rewrite /wp-admin$ $scheme://$host$uri/ permanent;

# Directives to send expires headers and turn off 404 error logging.
location ~* ^.+\.(ogg|ogv|eot|atom|tgz|gz|rar|bz2|doc|xls|exe|ppt|tar|mid|midi|bmp|rtf)$ {
	access_log off; log_not_found off; expires max;
}