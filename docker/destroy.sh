#!/bin/bash
set -e
 
docker-compose down --volumes
docker rmi pdlm_nginx_img pdlm_php_img