<?php
$editPag = $post['editar_pagina'];
$pathLoadPag = "/loadpag/{$editPag}";


$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);

	$preloaderFull['layerBackgroundColor'] = 'b-w-t,0';
	$preloaderFull['backgroundColor'] = array('purple,5', 'blue,3');
	$preloaderFull['mode'] = "0";
	$preloaderFull = new AppBundle\Utility\Obj\preloaderFull($preloaderFull);


	## header
	$header = new AppBundle\Utility\Obj\header();

		#div load pag
		$div['style'] = "z-index: 1; position: absolute;";
		$div['name'] = "proyectPag";
		$div = new AppBundle\Utility\Obj\div($div);

		#div pane
		$div_2['textAling'] = "r";
		$div_2['style'] = "z-index: 2; width: 100%; position: absolute; bottom: 40px; right: 40px;";
		$div_2['name'] = "panel";
		$div_2['js'] = 

			"function loadlink(){
	    		$('div[name=proyectPag]').load('{$pathLoadPag}',function () {
	         		$(this).unwrap();
	    		});
			}
			loadlink();
			// setInterval(function(){
			//     loadlink() // this will run after every 5 seconds
			// }, 5000);";

		$div_2 = new AppBundle\Utility\Obj\div($div_2);

			$button['large'] = TRUE;
			$button['mode'] = "button";
			$button['floating'] = TRUE;
			$button = new AppBundle\Utility\Obj\inputButton($button);

				$icon['icon'] = 'mode_edit';
				$icon = new AppBundle\Utility\Obj\icon($icon);

			$button->addObj($icon);



		$div_2->addObj($button);
	$header->addObj($div);
	$header->addObj($div_2);
	## main
	$main = new AppBundle\Utility\Obj\main();

	$footer['shadow'] = 5;
	$footer['backgroundColor'] = "red,6";
	$footer['stickyfooter'] = true;
	$footer = new AppBundle\Utility\Obj\footer($footer);

$pag->addObj($preloaderFull);
$pag->addObj($header);
$pag->addObj($main);
$pag->addObj($footer);
$pag->render();