<?php
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);

	$br['repeat'] = 2;
	$br = new AppBundle\Utility\Obj\br($br);
	
	$preloaderFull['layerBackgroundColor'] = 'b-w-t,0';
	$preloaderFull['backgroundColor'] = array('purple,5', 'blue,3');
	$preloaderFull['mode'] = "0";
	$preloaderFull = new AppBundle\Utility\Obj\preloaderFull($preloaderFull);

	$header = new AppBundle\Utility\Obj\header();

		$title['textAling'] = 'c';
		$title['textColor'] = 'grey,9';
		$title['text'] = 'Crear Pagina :';
		$title = new AppBundle\Utility\Obj\h($title);

	$header->addObj($br);
	$header->addObj($title);

	$main['shadow'] = "0";
	$main['container'] = TRUE;
	$main = new AppBundle\Utility\Obj\main($main);



		$form['textAling'] = 'c';
		$form['method'] = 'POST';
		$form['action'] = '/createpag';
		$form = new AppBundle\Utility\Obj\form($form);

			$inputFields['name'] = 'nueva_pagina';
			$inputFields['text'] = 'nombre pagina';
			$inputFields['placeholder'] = 'ingrese el nombre de la pagina';
			$inputFields = new AppBundle\Utility\Obj\inputFields($inputFields);

			$inputButton['mode'] = 'button';
			$inputButton['text'] = 'crear';
			$inputButton['submit'] = true;
			$inputButton = new AppBundle\Utility\Obj\inputButton($inputButton);

				$iconFields = new AppBundle\Utility\Obj\icon();
				$iconButton = clone $iconFields;

				$iconFields->icon = "create";

				$iconButton->icon = "send";
				$iconButton->float = "r";

			$inputFields->addObj($iconFields);
			$inputButton->addObj($iconButton);
		$form->addObj($br);
		$form->addObj($inputFields);
		$form->addObj($br);
		$form->addObj($inputButton);

		if(!empty($post)){
			$alert['redirectPath'] = "/createpag";
			$alert = new AppBundle\Utility\Obj\alert($alert);

			$p['text'] = "Pagina '{$post['nueva_pagina']}' creada exitosamente";
			$p = new AppBundle\Utility\Obj\p($p);

			$divContent['textAling'] = 'c';
			$divContent = new AppBundle\Utility\Obj\div($divContent);
				
				$closeInput['mode'] = 'button';
				$closeInput['text'] = 'cerrar';
				$closeInput['flat'] = TRUE;
				$closeInput['class'] = 'modal-action modal-close';

				$closeInput = new AppBundle\Utility\Obj\inputButton($closeInput);

			$divContent->addObj($closeInput);

			$alert->addObj($p);
			$alert->addObj($divContent);

			$main->addObj($alert);
		}
		elseif(!empty($error)){
			$alert = new AppBundle\Utility\Obj\alert();

			$p['text'] = "Intente nuevamente ";
			$p = new AppBundle\Utility\Obj\p($p);

			$divContent['textAling'] = 'c';
			$divContent = new AppBundle\Utility\Obj\div($divContent);
				
				$closeInput['mode'] = 'button';
				$closeInput['text'] = 'cerrar';
				$closeInput['flat'] = TRUE;
				$closeInput['class'] = 'modal-action modal-close';

				$closeInput = new AppBundle\Utility\Obj\inputButton($closeInput);

			$divContent->addObj($closeInput);

			$alert->addObj($p);
			$alert->addObj($divContent);

			$main->addObj($alert);			
		}

	$main->addObj($form);
	$footer['shadow'] = 5;
	$footer['backgroundColor'] = "red,6";
	$footer['stickyfooter'] = true;
	$footer = new AppBundle\Utility\Obj\footer($footer);

$pag->addObj($preloaderFull);
$pag->addObj($header);
$pag->addObj($main);
$pag->addObj($footer);
$pag->render();