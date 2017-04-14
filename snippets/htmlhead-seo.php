 <?php
    $htmlhead_seo = c::get('plugin.htmlhead.seo', [
        'author'      => str::unhtml($page->head_author()),
        'description' => str::unhtml($page->head_description()),
        'robots'      => 'index, follow, noodp',
    ]);
    if(!is_array($htmlhead_seo)) $htmlhead_seo = [];
    foreach ($htmlhead_seo as $key => $value) {
        echo brick('meta')
            ->attr('name', $key)
            ->attr('content', $value).PHP_EOL;
    }
?>