<?php
if(!empty($post)){
	$editPag = $post['editar_pagina'];
	$pathLoadPag = "/loadpag/{$editPag}/default";
	$pathLoadPag = "/loadpag/{$editPag}/default";
}


$pag['backgroundColor'] = "b-w-t,0";
$pag = new AppBundle\Utility\Obj\pag($pag);

	$preloaderFull['layerBackgroundColor'] = 'b-w-t,0';
	$preloaderFull['backgroundColor'] = array('purple,5', 'blue,3');
	$preloaderFull['mode'] = "0";
	$preloaderFull = new AppBundle\Utility\Obj\preloaderFull($preloaderFull);


	$style = new AppBundle\Utility\Obj\style(); 
	$style->style = 
	"button{
		display: block !important;
		margin: 10px 0px !important;
	}";
	$pag->addObj($style);


	## header
	$header = new AppBundle\Utility\Obj\header();

		#div load pag
		$div['style'] = "z-index: 1; position: absolute;";
		$div['name'] = "proyectPag";
		$div = new AppBundle\Utility\Obj\div($div);

		#div pane
		$div_2['textAling'] = "r";
		$div_2['style'] = "position: absolute; bottom: 40px; right: 40px;";
		$div_2['name'] = "panel";
		if(!empty($post)){
			$div_2['js'] = 

				"function loadlink(){
		    		$('div[name=proyectPag]').load('{$pathLoadPag}',function () {
		         		$(this).unwrap();
		    		});
				}
				function loadlink2(arg){
					$('div[name=proyectPag]').load(arg,function () {
		         		$(this).unwrap();
		    		});
				}
				loadlink();
				// setInterval(function(){
				//     loadlink() // this will run after every 5 seconds
				// }, 5000);";

		}	
		$div_2 = new AppBundle\Utility\Obj\div($div_2);



		$sideNavVisible['edge'] = 'r';
		$sideNavVisible = new AppBundle\Utility\Obj\sideNav($sideNavVisible);
			$button['class'] = "circle-button-edit";
			$button['large'] = TRUE;
			$button['mode'] = "button";
			$button['floating'] = TRUE;
			$button = new AppBundle\Utility\Obj\inputButton($button);

				$icon['icon'] = 'visibility';
				$icon = new AppBundle\Utility\Obj\icon($icon);

			$button->addObj($icon);
		$sideNavVisible->addObj($button);

			$a['text'] = 'Agregar objeto';
			$a['dataTarget'] = $editPag;
			// $a['href'] = '/listobj/'.$editPag;
			$a['textAling'] = 'l';
			$a = new AppBundle\Utility\Obj\a($a);
			$a2 = clone $a;
			$a3 = clone $a;
			
				$icon_a['size'] = 1;
				$icon_a['float'] = 'l';
				$icon_a['icon'] = 'add';
				$icon_a = new AppBundle\Utility\Obj\icon($icon_a);
			$a->addObj($icon_a);
		$sideNavVisible->addObj($a);

			$a2->text = "Modificar objeto";
			$a2->dataTarget = $editPag;

				$icon_a2 = clone $icon_a;
				$icon_a2->icon = "edit";

			$a2->addObj($icon_a2);



		$sideNavVisible->addObj($a2);
			$a3->text = "Borrar objeto";
			$a3->dataTarget = $editPag;

				$icon_a3 = clone $icon_a;
				$icon_a3->icon = "remove";

			$a3->addObj($icon_a3);




		$sideNavVisible->addObj($a3);

			$a4['href'] = '/editpag';
			$a4['text'] = 'Volver';
			$a4['textAling'] = 'l';
			$a4 = new AppBundle\Utility\Obj\a($a4);

				$icon_a4 = clone $icon_a;
				$icon_a4->icon = 'arrow_back';

			$a4->addObj($icon_a4);

		$sideNavVisible->addObj($a4);

		unset($a, $a2, $a3, $a4,$icon_a, $icon_a2, $icon_a3, $icon_a4, $button, $icon);
			$button['class'] = "circle-button-edit";
			$button['large'] = TRUE;
			$button['mode'] = "button";
			$button['floating'] = TRUE;
			$button = new AppBundle\Utility\Obj\inputButton($button);

				$icon['icon'] = 'visibility_off';
				$icon = new AppBundle\Utility\Obj\icon($icon);

			$button->addObj($icon);		
		$sideNavNoVisible['edge'] = 'r';
		$sideNavNoVisible = new AppBundle\Utility\Obj\sideNav($sideNavNoVisible);
		$sideNavNoVisible->addObj($button);

			$a['text'] = 'Agregar objeto oculto';
			$a['dataTarget'] = $editPag;
			// $a['href'] = '/listobj/'.$editPag;
			$a['textAling'] = 'l';
			$a = new AppBundle\Utility\Obj\a($a);
			$a2 = clone $a;
			$a3 = clone $a;
			
				$icon_a['size'] = 1;
				$icon_a['float'] = 'l';
				$icon_a['icon'] = 'add';
				$icon_a = new AppBundle\Utility\Obj\icon($icon_a);
			$a->addObj($icon_a);
		$sideNavNoVisible->addObj($a);

			$a2->text = "Modificar objeto oculto";
			$a2->dataTarget = $editPag;

				$icon_a2 = clone $icon_a;
				$icon_a2->icon = "edit";

			$a2->addObj($icon_a2);



		$sideNavNoVisible->addObj($a2);
			$a3->text = "Borrar objeto oculto";
			$a3->dataTarget = $editPag;

				$icon_a3 = clone $icon_a;
				$icon_a3->icon = "remove";

			$a3->addObj($icon_a3);



		$sideNavNoVisible->addObj($a3);


			$a4['href'] = '/editpag';
			$a4['text'] = 'Volver';
			$a4['textAling'] = 'l';
			$a4 = new AppBundle\Utility\Obj\a($a4);

				$icon_a4 = clone $icon_a;
				$icon_a4->icon = 'arrow_back';

			$a4->addObj($icon_a4);

		$sideNavNoVisible->addObj($a4);

  		unset($a, $a2, $a3, $a4,$icon_a, $icon_a2, $icon_a3, $icon_a4, $button, $icon);
			$button['class'] = "circle-button-edit";
			$button['large'] = TRUE;
			$button['mode'] = "button";
			$button['floating'] = TRUE;
			$button = new AppBundle\Utility\Obj\inputButton($button);

				$icon['icon'] = 'mode_edit';
				$icon = new AppBundle\Utility\Obj\icon($icon);

			$button->addObj($icon);
		$sideNavCms['edge'] = 'r';
		$sideNavCms = new AppBundle\Utility\Obj\sideNav($sideNavCms);
		$sideNavCms->addObj($button);

			$a['text'] = 'Agregar pagina';
			$a['dataTarget'] = $editPag;
			// $a['href'] = '/listobj/'.$editPag;
			$a['textAling'] = 'l';
			$a = new AppBundle\Utility\Obj\a($a);
			$a2 = clone $a;
			$a3 = clone $a;
			
				$icon_a['size'] = 1;
				$icon_a['float'] = 'l';
				$icon_a['icon'] = 'add';
				$icon_a = new AppBundle\Utility\Obj\icon($icon_a);
			$a->addObj($icon_a);
		$sideNavCms->addObj($a);

			$a3->text = "Borrar pagina";
			$a3->dataTarget = $editPag;

				$icon_a3 = clone $icon_a;
				$icon_a3->icon = "remove";

			$a3->addObj($icon_a3);

		$sideNavCms->addObj($a3);

			$a4['href'] = '/editpag';
			$a4['text'] = 'Volver';
			$a4['textAling'] = 'l';
			$a4 = new AppBundle\Utility\Obj\a($a4);

				$icon_a4 = clone $icon_a;
				$icon_a4->icon = 'arrow_back';

			$a4->addObj($icon_a4);

		$sideNavCms->addObj($a4);


		
		$div_2->addObj($sideNavCms);
		$div_2->addObj($sideNavNoVisible);
		$div_2->addObj($sideNavVisible);
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
if(!empty($editar)){
	if(!empty($action) && $action !== 'default'){
		$editJs = new AppBundle\Utility\Obj\editJs($editar);
		$pag->js = $editJs->getJs('default');
		switch ($action) {
			case 'add':
			$pag->js = $editJs->getJs('add'); 
			break;
			case 'edit':
			$pag->js = $editJs->getJs('edit');				
			break;
			case 'del':
			$pag->js = $editJs->getJs('del');				
			break;
		}
	}
}
if(!empty($post)){
	$pag->js = 
	"$('a').click(function(e){
		action = e.target.firstChild.data;
		pag = e.target.dataset.target;

		switch(action){
			case 'Agregar objeto' : 
				loadlink2('/loadpag/{$editPag}/add');
			break;
			case 'Modificar objeto' : 
				loadlink2('/loadpag/{$editPag}/edit');
			break;
			case 'Borrar objeto' : 
				loadlink2('/loadpag/{$editPag}/del');
			break;
			case 'Agregar objeto oculto' : 
				loadlink2('/loadpag/{$editPag}/add');
			break;
			case 'Modificar objeto oculto' : 
				loadlink2('/loadpag/{$editPag}/edit');
			break;
			case 'Borrar objeto oculto' : 
				loadlink2('/loadpag/{$editPag}/del');
			break;
			case 'Agregar pagina' : 
				loadlink2('/loadpag/createPag.html.php/default');
			break;
			case 'Borrar pagina' : 
				loadlink2('/loadpag/deletePag.html.php/default');
			break;
		}
	});";	
}
$pag->render();