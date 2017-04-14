<?php

// README:
// https://getkirby.com/docs/developer-guide/advanced/models
// 
// 
// Example uses this:
// https://github.com/getkirby/starterkit/blob/master/site/blueprints/site.yml

class TEMPLATEPage extends Page {

    public function head_author() {
        return $this->author()->isNotEmpty() ? $this->author() : site()->author();
    }

    public function head_description() {
        return $this->description()->isNotEmpty() ? $this->description() : site()->description();
    }

}