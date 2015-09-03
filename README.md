![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)

php-livereload is a [Docker][1] image running [Apache][4] with [PHP][2] and [LiveReload][3] support.

### Usage

[mod\_vhost\_alias][5] is enabled and configured to serve files from `/vhosts/%1`. For example `http://mysubdomain.example.com` will load files from `/vhosts/mysubdomain`. Multiple vhosts are supported.

    $ docker run -d -p 80:80 -v /path/to/vhosts/:/vhosts/ cciocov/php-livereload

### LiveReload

A LiveReload server is not provided by this image, but you can use [cciocov/livereload][7]. To enable LiveReload support start your container with a `LIVERELOAD_URL` environment variable, pointing to a LiveReload server.

    $ docker run -d -p 80:80 -v /path/to/vhosts/:/vhosts/ -e LIVERELOAD_URL=http://livereload.example.com cciocov/php-livereload

[mod\_ext\_filter][6] is used to embed the LiveReload snippet into each text/html server response.

[1]: http://www.docker.com
[2]: http://httpd.apache.org
[3]: http://www.php.net
[4]: http://www.livereload.com
[5]: http://httpd.apache.org/docs/current/mod/mod_vhost_alias.html
[6]: http://httpd.apache.org/docs/current/mod/mod_ext_filter.html
[7]: http://hub.docker.com/r/cciocov/livereload/
