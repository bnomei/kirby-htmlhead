<?php 
    // Facebook: https://developers.facebook.com/docs/sharing/webmasters#markup
    // Open Graph: http://ogp.me/
    $htmlhead_og = c::get('plugin.htmlhead.opengraph', [
        'og:title'          => str::unhtml($page->title()),
        'og:type'           => 'website',
        'og:url'            => $page->url(),
        'og:image'          => $page->hasImages() ? $page->images()->first()->resize(470)->url() : null,
        'og:site_name'      => site()->title(),
        'og:description'    => str::unhtml($page->head_description()),
        'og:locale'         => str_replace('.UTF8','',site()->locale()),
        'article:author'    => str::unhtml($page->head_author()),
    ]);
    if(!is_array($htmlhead_og)) $htmlhead_og = [];
    foreach ($htmlhead_og as $key => $value) {
        if(!$value) continue;
        echo brick('meta')
            ->attr('property', $key)
            ->attr('content', $value).PHP_EOL;
    }
?>