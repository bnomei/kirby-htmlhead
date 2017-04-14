<?php
	$htmlhead_googlewebfonts = c::get('plugin.htmlhead.googlewebfonts', []);
	if(is_string($htmlhead_googlewebfonts)) $htmlhead_googlewebfonts = [$htmlhead_googlewebfonts];
	if(!is_array($htmlhead_googlewebfonts)) $htmlhead_googlewebfonts = [];
	foreach ($htmlhead_googlewebfonts as $family) {
		$gwfurl = 'https://fonts.googleapis.com/css?family=' . $family;
		if(v::url($gwfurl)) {
			echo brick('link')
				->attr('href', $gwfurl)
				->attr('rel', 'stylesheet').PHP_EOL;
		}
	}
?>