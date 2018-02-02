<?php
	$htmlhead_feed = c::get('plugin.htmlhead.feed', false);
	if($htmlhead_feed && is_string($htmlhead_feed) && str::length(trim($htmlhead_feed)) > 0) {
		if($htmlhead_feedpage = page($htmlhead_feed)) {
			echo brick('link')
				->attr('rel',  'alternate')
				->attr('type', 'application/rss+xml')
				->attr('href',  $htmlhead_feedpage->url())
				->attr('title', $htmlhead_feedpage->title()).PHP_EOL;
		} else {
			echo brick('link')
				->attr('rel',  'alternate')
				->attr('type', 'application/rss+xml')
				->attr('href',  url($htmlhead_feed))
				->attr('title', $htmlhead_feed).PHP_EOL;
		}
	}
?>