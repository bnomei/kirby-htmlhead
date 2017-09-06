<?php

class KirbyHTMLHead {

  static $snippets = [];
  static function snippets($page) {
    $return = [];

    $indent = c::get('plugin.htmlhead.indent', '    ');
    $customSnippets = c::get('plugin.htmlhead.snippets', []);
    if(!is_array($customSnippets)) $customSnippets = [];
    self::$snippets = array_merge(self::$snippets);
    sort(self::$snippets);

    foreach (self::$snippets as $snippetname) {
      $snip = snippet($snippetname, ['page' => $page, 'indent' => $indent], true);
      if(str::length(trim($snip)) == 0) continue;

      $snip = explode(PHP_EOL, $snip);
      $sarr = array_map(function($line) use ($indent){
        return $indent.trim($line).PHP_EOL;
      }, $snip);

      $return[] = $indent.'<!-- '.str::upper(str_replace('htmlhead-','', $snippetname)).' -->'.PHP_EOL;
      $return = array_merge($return, $sarr);
    }

    return implode($return);
  }

  static function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
  }
}

/****************************************
  SNIPPETS
 ***************************************/

$snippets = new Folder(__DIR__ . '/snippets');
foreach ($snippets->files() as $file) {
  if($file->extension() == 'php') {
    $kirby->set('snippet', $file->name(), $file->root());
    KirbyHTMLHead::$snippets[] = $file->name();
  }
}

/****************************************
  PAGE METHODS
 ***************************************/

$kirby->set('page::method', 'htmlhead_snippets',
  function($page) {
    return KirbyHTMLHead::snippets($page);
});

$kirby->set('page::method', 'htmlhead_alpha',
  function($page, $title = null) {
    $firstmetatags = [
      '<meta charset="utf-8">',
      '<meta http-equiv="x-ua-compatible" content="ie=edge">',
      '<meta name="viewport" content="width=device-width, initial-scale=1">',
      '<meta http-equiv="content-type" content="text/html; charset=utf-8" />',
      '<base href="'.site()->url().'">',
    ];

    if($title == null) {
      $title = str::unhtml($page->title());
    }
    if($title != false) {
      $firstmetatags[] = '<title>'.$title.'</title>';
    }

    $indent = c::get('plugin.htmlhead.indent', '    ');
    $firstmetatags = array_map(function($line) use ($indent){
      return $indent.trim($line).PHP_EOL;
    }, $firstmetatags);
    return implode($firstmetatags).PHP_EOL;
  });

$kirby->set('page::method', 'htmlhead_omega',
  function($page, $title = null) {
    $firstmetatags = [
      '<meta charset="utf-8">',
      '<meta http-equiv="x-ua-compatible" content="ie=edge">',
      '<meta name="viewport" content="width=device-width, initial-scale=1">',
      // '<meta http-equiv="content-type" content="text/html; charset=utf-8" />',
      '<base href="'.site()->url().'">',
      '<link rel="canonical" href="'.$page->url().'">',
      // '<meta name="generator" content="kirby cms">',
    ];

    if($title == null) {
      $title = str::unhtml($page->title());
    }
    if($title != false) {
      $firstmetatags[] = '<title>'.$title.'</title>';
    }

    $indent = c::get('plugin.htmlhead.indent', '    ');
    $firstmetatags = array_map(function($line) use ($indent){
      return $indent.trim($line).PHP_EOL;
    }, $firstmetatags);
    return implode($firstmetatags).PHP_EOL;
  });
