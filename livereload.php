#!/usr/bin/env php
<?php
$content = file_get_contents('php://stdin');

$url = getenv('LIVERELOAD_URL');
if (!empty($url)) {
  $url = replace_placeholders($url);

  $tag = "<script src=\"$url/livereload.js\"></script>";
  $re = '/<\/(head|body|html)>/i';
  $content = preg_replace($re, "$tag\n</\\1>", $content, 1, $count);

  if (!$count) {
    $content .= "\n$tag";
  }
}

print $content;


function replace_placeholders($url) {
  $url = preg_replace_callback('/%host\[(\d+)\]/', 'get_host_part', $url);
  return $url;
}

function get_host_part($matches) {
  $host = explode('.', $_SERVER['HTTP_HOST']);
  array_unshift($host, $_SERVER['HTTP_HOST']);

  return $host[$matches[1]];
}
