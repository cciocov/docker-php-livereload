#!/bin/bash
docker run --rm -e VIRTUAL_HOST="*.php.auditionpad.com" -e LIVERELOAD_URL=http://%host[1].livereload.auditionpad.com/livereload.js -v /root/vhosts/:/vhosts/ php-livereload
