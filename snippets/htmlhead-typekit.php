<?php 
	$htmlhead_typekit = c::get('plugin.htmlhead.typekit', false);
	if($htmlhead_typekit && str::length(trim($htmlhead_typekit)) > 0) {
		$typekiturl = 'https://use.typekit.net/'.$htmlhead_typekit;
		if(v::url($typekiturl)) {
			echo brick('script')
				->attr('src', $typekiturl).PHP_EOL;
			echo brick('script', 'try{Typekit.load({ async: true });}catch(e){}').PHP_EOL;
		}	
	}	
?>