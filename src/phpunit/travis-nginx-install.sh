#!/bin/bash

#

set -e

sudo apt-get update -qq
sudo apt-get install -qq nginx realpath

sudo service nginx stop

DIR=$(dirname "$0")
echo "DIR: $DIR"
echo "TRAVIS_BUILD_DIR: $TRAVIS_BUILD_DIR"
IP_BASE_DIR=$(realpath "$DIR/..")

NGINX_CONF="/etc/nginx/sites-enabled/default"

PHP_FPM_BIN="$HOME/.phpenv/versions/$TRAVIS_PHP_VERSION/sbin/php-fpm"
echo "PHP_FPM_BIN: $PHP_FPM_BIN"
PHP_FPM_CONF="$DIR/php-fpm.conf"
PHP_FPM_SOCK=$(realpath "$DIR")/php-fpm.sock

USER=$(whoami)

# php-fpm configuration
echo "
[global]

[travis]
user = $USER
group = $USER
listen = $PHP_FPM_SOCK
pm = static
pm.max_children = 2

php_admin_value[memory_limit] = 128M
" > $PHP_FPM_CONF

# nginx configuration
echo "
server {
	listen	80;
	root	$IP_BASE_DIR/;
	index	index.php index.html;

	location ~ \.php {
		fastcgi_pass	unix:$PHP_FPM_SOCK;
		include			fastcgi_params;
	}
}
" | sudo tee $NGINX_CONF > /dev/null

# Start daemons
sudo $PHP_FPM_BIN --fpm-config "$DIR/php-fpm.conf"
sudo service nginx start