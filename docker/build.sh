#!/bin/bash
set -e
 
if ! [[ -d ../logs/nginx ]]; then
    mkdir -p ../logs/nginx
fi
 
if ! [[ -d ../logs/mysql ]]; then
    mkdir -p ../logs/mysql
fi
 
if ! [[ -d ../logs/php ]]; then
    mkdir -p ../logs/php
fi
 
if ! [[ -d ../database ]]; then
    mkdir ../database
fi
 
docker-compose  up -d --build 
 
# docker exec pdlm_apache_con chown -R root:www-data /usr/local/apache2/logs
# docker exec pdlm_php_con chown -R root:www-data /usr/local/etc/logs