#!/bin/bash

# Adjust permissions
chmod 777 /var/www/html/wordpress/web/app/cache
echo "File Permission Updated"
exec "$@"
