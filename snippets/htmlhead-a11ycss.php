<?php
	$htmlhead_a11y_debugOnly = c::get('plugin.htmlhead.a11ycss.debugOnly', c::get('debug', false));
	$htmlhead_a11y = c::get('plugin.htmlhead.a11ycss', 'https://rawgit.com/ffoodd/a11y.css/master/css/a11y-en.css');

	if( $htmlhead_a11y_debugOnly && v::url($htmlhead_a11y)) {
		echo css($htmlhead_a11y, 'screen').PHP_EOL;
	}
?>