<?php
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);
	
	$preloaderFull['layerBackgroundColor'] = 'b-w-t,0';
	$preloaderFull['backgroundColor'] = array('purple,5', 'blue,3');
	$preloaderFull['mode'] = "2";
	$preloaderFull = new AppBundle\Utility\Obj\preloaderFull($preloaderFull);

	$header['backgroundColor'] = "blue,8";
	$header = new AppBundle\Utility\Obj\header($header);

		$carrousel = new AppBundle\Utility\Obj\carousel();

			$div['backgroundColor'] = 'green,3';
			$div = new AppBundle\Utility\Obj\div($div);

			$div2 = clone $div;
			$div2->backgroundColor = "green,5";
			$div2->refreshInfo();


			$div3 = clone $div;
			$div3->backgroundColor = "green,8";
			$div3->refreshInfo();

		$carrousel->addObj($div);
		$carrousel->addObj($div2);
		$carrousel->addObj($div3);

		$nav['backgroundColor'] = 'blue,8';
		$nav['float'] = 'r';
		$nav['mobile'] = TRUE;
		$nav['mobileBackgroundColor'] = "red,6";
		$nav['shadow'] = 1;
		$nav = new AppBundle\Utility\Obj\nav($nav);

			$a_1['text'] = 'Logo';
			$a_1 = new AppBundle\Utility\Obj\a($a_1);

				$icon_1['icon'] = "ac_unit";
				$icon_1['textColor'] = 'grey,1';
				$icon_1['float'] = "l";
				$icon_1['size'] = "1";
				$icon_1 = new AppBundle\Utility\Obj\icon($icon_1);
			
			$a_1->addObj($icon_1);

			$a_2['textColor'] = 'grey,1';
			$a_2['text'] = 'btn 1';
			$a_2 = new AppBundle\Utility\Obj\a($a_2);

				$badge['text'] = "mensajes 1";
				$badge['backgroundColor'] = 'green,8';
				$badge['textColor'] = 'grey,8';
				$badge['new'] = TRUE;
				$badge = new AppBundle\Utility\Obj\badge($badge);	

				$icon_x['icon'] = "ac_unit";
				$icon_x['textColor'] = 'grey,1';
				$icon_x['size'] = "1";
				$icon_x['float'] = "l";
				$icon_x = new AppBundle\Utility\Obj\icon($icon_x);

			$a_2->addObj($icon_x);
			
			$a_3['textColor'] = 'grey,1';
			$a_3['text'] = 'btn 3';
			$a_3 = new AppBundle\Utility\Obj\a($a_3);
			$a_3->addObj($icon_1);

		$nav->addObj($a_1);
		$nav->addObj($a_2);
		$nav->addObj($a_3);

			$dropdown['button'] = TRUE;
			$dropdown = new AppBundle\Utility\Obj\dropdown();
					
				unset($a_1, $a_2, $a_3, $icon_1);

				$a_1['textColor'] = 'grey,1';
				$a_1['text'] = 'dropdown';
				$a_1 = new AppBundle\Utility\Obj\a($a_1);

					$icon_1['icon'] = "arrow_drop_down";
					$icon_1['textColor'] = 'grey,1';
					$icon_1['float'] = "r";
					
					$icon_1 = new AppBundle\Utility\Obj\icon($icon_1);

				$a_1->addObj($icon_1);

				unset($icon_1);
				$a_2['textColor'] = 'grey,9';
				$a_2['text'] = 'btn 1';
				$a_2 = new AppBundle\Utility\Obj\a($a_2);

					$icon_1['icon'] = "ac_unit";
					$icon_1['textColor'] = 'grey,9';
					$icon_1['float'] = "r";
					
					$icon_1 = new AppBundle\Utility\Obj\icon($icon_1);

				$a_2->addObj($icon_1);

				$a_3['textColor'] = 'grey,9';
				$a_3['text'] = 'btn 2';
				$a_3 = new AppBundle\Utility\Obj\a($a_3);
				$a_3->addObj($icon_1);

			$dropdown->addObj($a_1);
			$dropdown->addObj($a_2);
			$dropdown->addObj($a_3);

		$nav->addObj($dropdown);
		$nav->addObj($dropdown);

	$header->addObj($nav);

	// $main['container'] = TRUE;
	$main['shadow'] = "0";
	$main = new AppBundle\Utility\Obj\main($main);



	$main->addObj($carrousel);

	$footer['shadow'] = 5;
	$footer['backgroundColor'] = "red,6";
	$footer['stickyfooter'] = true;
	$footer = new AppBundle\Utility\Obj\footer($footer);

		$br['repeat'] = 1;
		$br = new AppBundle\Utility\Obj\br($br);

	$footer->addObj($br);
	$footer->addObj($br);

$pag->addObj($preloaderFull);
$pag->addObj($header);
$pag->addObj($main);
// $pag->addObj($footer);
$pag->render();
