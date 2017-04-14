<?php

//
// README:
// https://getkirby.com/docs/developer-guide/objects/page

page::$methods['head_author'] = function($page) {
    return $page->author()->isNotEmpty() ? $page->author() : site()->author();
};

page::$methods['head_description'] = function($page) {
   return $page->description()->isNotEmpty() ? $page->description() : site()->description();
};