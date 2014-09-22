<?php
/*
	EADev Configuration file
	http://ea-dev.com
*/
return array(
	// Server Name
		'serverName'	=> 'BoholRO',
		
	// Rate my server link
		'rms' 		=> '',
		
	// Forums link here
		'forum' 	=> '',
		
	// Facebook page link here.
		'facebook-page' => 'www.facebook.com/boholro',

	// You tube video link
		'youtube-video'	=> '<iframe width="309" height="245" src="//www.youtube.com/embed/IjjqXcQL26s" frameborder="0" allowfullscreen></iframe>',

	// Server Time ( use http://www.timeanddate.com/ )
		'serverTime'	=>	'<iframe src="http://free.timeanddate.com/clock/i3s2kzjx/n145/fs12/fcff2229/tct/pct" frameborder="0" width="70" height="17" allowTransparency="true"></iframe>',
	
	// RSS settings
		'enablerss'		=> true,						// true/ false	true will show RSS links on index page
		'news' 			=> 'http://bohol.ro-online.net/themes/default/main/bronews.rss',		// RSS News link
		
	// Screenshots images
	// Put images inside folder "themes/default/img/ss"	
		'sliders' => array(
			// Image name.extension, description ( Don't forget , ( comma ) )
			'slider.png, Get BoholRO client now to join the fun!',
			'slider3.png, Follow the rules at all times! Makes your gaming experience more fun and fair!',
			'slider2.png, Invite your friends and facebook friends to come over!',
		),

	// Woe Schd
		'woeSchd'	=>	array(

			'Daily' => '1pm-2pm & 9pm-10pm',
		),
)
?>