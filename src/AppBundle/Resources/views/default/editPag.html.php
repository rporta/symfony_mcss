<?php
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);
	
	$preloaderFull['layerBackgroundColor'] = 'b-w-t,0';
	$preloaderFull['backgroundColor'] = array('purple,5', 'blue,3');
	$preloaderFull['mode'] = "0";
	$preloaderFull = new AppBundle\Utility\Obj\preloaderFull($preloaderFull);

	$header['backgroundColor'] = "blue,8";
	$header = new AppBundle\Utility\Obj\header($header);

	$main['shadow'] = "0";
	$main = new AppBundle\Utility\Obj\main($main);

	$footer['shadow'] = 5;
	$footer['backgroundColor'] = "red,6";
	$footer['stickyfooter'] = true;
	$footer = new AppBundle\Utility\Obj\footer($footer);

$pag->addObj($preloaderFull);
$pag->addObj($header);
$pag->addObj($main);
$pag->addObj($footer);
$pag->render();