<?php
define('PAGINATION_COUNT',10);
/*
function getFolder(){
    return app()->getLocale()=='ar'?'css-rtl':'css';
}
*/


function header_logo(){
    $site_name = \App\Models\General_setting::select('site_logo_icon','site_logo_footer','site_logo_header')->first() ;
    $logo_header=$site_name->site_logo_header;
    return $logo_header;

}
function footer_logo(){
    $site_name = \App\Models\General_setting::select('site_logo_icon','site_logo_footer')->first() ;
    $logog_footer=$site_name->site_logo_footer;
    return $logog_footer;

}
function uploadimage($folder,$photo){
    $destination = 'public/assets/images/'.$folder;
    $photo = $photo;
    $filename = $photo->hashName();
    $photo->move($destination, $filename);
    return $filename;

}
function delete_photo($photo){

  $path=public_path().'/'.$photo;
   $path=str_replace('https://i-tswr.web2html5.com/','',$path);
    $path=str_replace('public_html/public','public_html',$path);

        unlink($path);

}
function getYoutubeId($url){

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

    return isset($match[1]) ? $match[1] : null;

}


