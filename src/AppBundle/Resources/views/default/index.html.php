<?php
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);
	
	$preloaderFull['layerBackgroundColor'] = 'b-w-t,0';
	$preloaderFull['backgroundColor'] = array('purple,5', 'blue,3');
	$preloaderFull['mode'] = "2";
	$preloaderFull = new AppBundle\Utility\Obj\preloaderFull($preloaderFull);

	$header['backgroundColor'] = "blue,8";
	$header = new AppBundle\Utility\Obj\header($header);

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

	$main['container'] = TRUE;
	$main['shadow'] = "0";
	$main = new AppBundle\Utility\Obj\main($main);

		$p['shadow'] = '2';
		$p['backgroundColor'] = 'red,3';
		$p['cardPanel'] = TRUE;
		$p['text'] = 'Resultados :';
		$p['textAling'] = 'c';
		$p = new AppBundle\Utility\Obj\p($p);

		$br['repeat'] = 1;
		$br = new AppBundle\Utility\Obj\br($br);

	$main->addObj($br);
	$main->addObj($p);
	$main->addObj($br);

		$table['shadow'] = 2;
		$table['mode'] = "highlight";
		$table['center'] = TRUE;
		$table = new AppBundle\Utility\Obj\table($table);
		$table->addHead('egm');
		$table->addHead('fecha');

			$rows['egm'] = 3 ;
			$rows['fecha'] = "2018-06-27";
		$table->addRow($rows);
			$rows['egm'] = 5 ;
			$rows['fecha'] = "2018-06-28";
		$table->addRow($rows);
			$rows['egm'] = 6 ;
			$rows['fecha'] = "2018-06-29";
		$table->addRow($rows);
			$rows['egm'] = 7 ;
			$rows['fecha'] = "2018-06-30";
		$table->addRow($rows);
			$rows['egm'] = 8 ;
			$rows['fecha'] = "2018-06-31";
		$table->addRow($rows);

	$main->addObj($table);
	$main->addObj($br);

		$modal['backgroundColor'] = "red,6";
		$modal['footerFixed'] = TRUE;
		$modal = new AppBundle\Utility\Obj\modal($modal);

		
			unset($a_1, $a_2, $a_3, $p);
			
			$text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum";
			$p['text'] = $text;
			$p['textAling'] = 'l';
			$p['textColor'] = 'grey,1';
			$p = new AppBundle\Utility\Obj\p($p);

			$a_1['href'] = '#';
			$a_1['text'] = 'modal';
			$a_1['backgroundColor'] = "red,6";
			$a_1['waves'] = '2';
			$a_1 = new AppBundle\Utility\Obj\a($a_1);

			$a_2['href'] = '#';
			$a_2['class'] = 'btn-flat modal-close';
			$a_2['text'] = 'agregar';
			$a_2['waves'] = '6';
			$a_2['textColor'] = 'grey,1';
			$a_2 = new AppBundle\Utility\Obj\a($a_2);

			$a_3['class'] = 'btn-flat modal-close';
			$a_3['href'] = '#';
			$a_3['text'] = 'cancelar';
			$a_3['waves'] = '2';
			$a_3['textColor'] = 'grey,1';
			$a_3 = new AppBundle\Utility\Obj\a($a_3);

			$divContent['textAling'] = 'r';
			$divContent = new AppBundle\Utility\Obj\div($divContent);
			$divContent->addObj($a_2);
			$divContent->addObj($a_3);

		$modal->addObj($a_1);
		$modal->addObj($p);
		$modal->addObj($divContent);

		$form['method'] = "POST";
		$form = new AppBundle\Utility\Obj\form($form);


			$input['activeBackgroundColor'] = 'blue,3';
			$input['textColor'] = 'red,3';
			$input['value'] = "50";
			$input['mode'] = "0";
			$input['name'] = "nombre01";


			$input = new AppBundle\Utility\Obj\inputRange($input);
			
			
		$form->addObj($input);

	$main->addObj($modal);
	$main->addObj($br);
	$main->addObj($br);
	$main->addObj($form);

	$footer['shadow'] = 5;
	$footer['backgroundColor'] = "red,6";
	$footer['stickyfooter'] = true;
	$footer = new AppBundle\Utility\Obj\footer($footer);
	$footer->addObj($br);
	$footer->addObj($br);

$pag->addObj($preloaderFull);
$pag->addObj($header);
$pag->addObj($main);
$pag->addObj($footer);
$pag->render();