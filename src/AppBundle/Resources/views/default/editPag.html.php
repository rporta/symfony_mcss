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
		$title['text'] = 'Editar Pagina :';
		$title = new AppBundle\Utility\Obj\h($title);

	$header->addObj($br);
	$header->addObj($title);

	$main['shadow'] = "0";
	$main['container'] = TRUE;
	$main = new AppBundle\Utility\Obj\main($main);

	if(!empty($selectFile)){
		$form['textAling'] = 'c';
		$form['method'] = 'POST';
		$form['action'] = '/editpag';
		$form = new AppBundle\Utility\Obj\form($form);

			$select['name'] = 'editar_pagina';
			$select['option'] = $selectFile;
			$select = new AppBundle\Utility\Obj\inputSelect($select);

			$inputButton['mode'] = 'button';
			$inputButton['text'] = 'editar';
			$inputButton['submit'] = true;
			$inputButton = new AppBundle\Utility\Obj\inputButton($inputButton);

				$iconButton = new AppBundle\Utility\Obj\icon();
				$iconButton->icon = "send";
				$iconButton->float = "r";

			$inputButton->addObj($iconButton);

		$form->addObj($select);
		$form->addObj($br);
		$form->addObj($inputButton);

	$main->addObj($form);
	}

	$footer['shadow'] = 5;
	$footer['backgroundColor'] = "red,6";
	$footer['stickyfooter'] = true;
	$footer = new AppBundle\Utility\Obj\footer($footer);

$pag->addObj($preloaderFull);
$pag->addObj($header);
$pag->addObj($main);
$pag->addObj($footer);
$pag->render();