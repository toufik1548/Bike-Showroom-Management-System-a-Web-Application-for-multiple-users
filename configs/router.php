<?php 

$main_url = $site_url; //user provided url

function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}

$full_url = url();
$slugs = str_replace($main_url."/", "", $full_url);
if($slugs!=""){
$slugr = explode("/",$slugs);
if($slugr[0]!=""){$slug=$slugr[0];}
if(isset($slugr[1]) && $slugr[1]!=""){$slug2=$slugr[1];}
}
?>