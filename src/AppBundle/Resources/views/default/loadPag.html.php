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


	## header
	$header = new AppBundle\Utility\Obj\header();

		#div load pag
		$div['style'] = "z-index: 1; position: absolute;";
		$div['name'] = "proyectPag";
		$div = new AppBundle\Utility\Obj\div($div);

		#div pane
		$div_2['textAling'] = "r";
		$div_2['style'] = "width: 100%; position: absolute; bottom: 40px; right: 40px;";
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

			$button['large'] = TRUE;
			$button['mode'] = "button";
			$button['floating'] = TRUE;
			$button = new AppBundle\Utility\Obj\inputButton($button);

				$icon['icon'] = 'mode_edit';
				$icon = new AppBundle\Utility\Obj\icon($icon);

			$button->addObj($icon);

		$sideNav['edge'] = 'r';
		$sideNav = new AppBundle\Utility\Obj\sideNav($sideNav);
		$sideNav->addObj($button);

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
		$sideNav->addObj($a);

			$a2->text = "Modificar objeto";
			$a2->dataTarget = $editPag;

				$icon_a2 = clone $icon_a;
				$icon_a2->icon = "edit";

			$a2->addObj($icon_a2);



		$sideNav->addObj($a2);
			$a3->text = "Borrar objeto";
			$a3->dataTarget = $editPag;

				$icon_a3 = clone $icon_a;
				$icon_a3->icon = "remove";

			$a3->addObj($icon_a3);




		$sideNav->addObj($a3);

			$a4['href'] = '/editpag';
			$a4['text'] = 'Volver';
			$a4['textAling'] = 'l';
			$a4 = new AppBundle\Utility\Obj\a($a4);

				$icon_a4 = clone $icon_a;
				$icon_a4->icon = 'arrow_back';

			$a4->addObj($icon_a4);

		$sideNav->addObj($a4);
		
		$div_2->addObj($sideNav);
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
	if(!empty($action)){
		switch ($action) {
			case 'add':
				$pag->js = 
				"$(document).click(function(e){
					e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");
					console.log(e);
					console.log(e.target.outerHTML);
					if( $(\"#alert-72197\").length){
											
					}
					else{
						/*agrego alerta*/
						$('body').append(
							'<div id=\"alert-72197\" class=\" amber darken-3 modal\"><div class=\"modal-content center-align  amber darken-3\"><p id=\"p-b41dd\" class=\"black-text transparent center-align\">Desea agregar un elemento dentro de este objeto : '+e.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\")+'<\/p><\/div><div class=\"modal-footer  amber darken-3\"><div class=\"center-align\"><button id=\"inputButton-ceab0\" href=\"#\" class=\"btn btn-flat\">aceptar<\/button>    <button id=\"inputButton-ceab1\" href=\"#\" class=\"btn btn-flat modal-action modal-close\">cancelar<\/button></div><\/div><script type=\"text/javascript\">$(\"#alert-72197\").modal({complete: function(e) {  $(\"#alert-72197\").remove(); }}); $(\"#alert-72197\").modal(\"open\");/*aca va el codigo ajax escucha el evento click del elemento id inputButton-ceab0 */<\/script><\/div>'
						);	
					}


					/*
					# alert ( desea action en objeto ) ? si : NO

						si:
							ajax:
					
								data : e
								url: /resolver/actual_pag/action

								done
					
									creo un FORM  con action editpag/pag/action

									lo agrego al body

									submit

					 */
					}); 
					window.onmouseover=function(e) {
						if($('.modal-overlay').length){
						}else{
							e.target.className = e.target.className + \" fifi teal accent-4 fifi\";
						}
					};
					window.onmouseout=function(e) {
						if($('.modal-overlay').length){
						}else{	
							e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");			  
						}					
					};
					";
				break;			
				break;
			case 'edit':
				$pag->js = 
				"$(document).click(function(e){
					e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");
					console.log(e);
					console.log(e.target.outerHTML);
					if( $(\"#alert-72197\").length){
											
					}
					else{
						/*agrego alerta*/
						$('body').append(
							'<div id=\"alert-72197\" class=\" amber darken-3 modal\"><div class=\"modal-content center-align  amber darken-3\"><p id=\"p-b41dd\" class=\"black-text transparent center-align\">Desea modificar este objeto : '+e.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\")+'<\/p><\/div><div class=\"modal-footer  amber darken-3\"><div class=\"center-align\"><button id=\"inputButton-ceab0\" href=\"#\" class=\"btn btn-flat\">aceptar<\/button>    <button id=\"inputButton-ceab1\" href=\"#\" class=\"btn btn-flat modal-action modal-close\">cancelar<\/button></div><\/div><script type=\"text/javascript\">$(\"#alert-72197\").modal({complete: function(e) {  $(\"#alert-72197\").remove(); }}); $(\"#alert-72197\").modal(\"open\");/*aca va el codigo ajax escucha el evento click del elemento id inputButton-ceab0 */<\/script><\/div>'
						);	
					}


					/*
					# alert ( desea action en objeto ) ? si : NO

						si:
							ajax:
					
								data : e
								url: /resolver/actual_pag/action

								done
					
									creo un FORM  con action editpag/pag/action

									lo agrego al body

									submit

					 */
					}); 
					window.onmouseover=function(e) {
						if($('.modal-overlay').length){
						}else{
							e.target.className = e.target.className + \" fifi teal accent-4 fifi\";
						}
					};
					window.onmouseout=function(e) {
						if($('.modal-overlay').length){
						}else{	
							e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");			  
						}					
					};
					";
				break;
				break;
			case 'del':

				$pag->js = 
				"$(document).click(function(e){
					e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");
					console.log(e);
					console.log(e.target.outerHTML);
					if( $(\"#alert-72197\").length){
											
					}
					else{
						/*agrego alerta*/
						$('body').append(
							'<div id=\"alert-72197\" class=\" amber darken-3 modal\"><div class=\"modal-content center-align  amber darken-3\"><p id=\"p-b41dd\" class=\"black-text transparent center-align\">Desea borrar este objeto : '+e.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\")+'<\/p><\/div><div class=\"modal-footer  amber darken-3\"><div class=\"center-align\"><button id=\"inputButton-ceab0\" href=\"#\" class=\"btn btn-flat\">aceptar<\/button>    <button id=\"inputButton-ceab1\" href=\"#\" class=\"btn btn-flat modal-action modal-close\">cancelar<\/button></div><\/div><script type=\"text/javascript\">$(\"#alert-72197\").modal({complete: function(e) {  $(\"#alert-72197\").remove(); }}); $(\"#alert-72197\").modal(\"open\");/*aca va el codigo ajax escucha el evento click del elemento id inputButton-ceab0 */<\/script><\/div>'
						);	
					}


					/*
					# alert ( desea action en objeto ) ? si : NO

						si:
							ajax:
					
								data : e
								url: /resolver/actual_pag/action

								done
					
									creo un FORM  con action editpag/pag/action

									lo agrego al body

									submit

					 */
					}); 
					window.onmouseover=function(e) {
						if($('.modal-overlay').length){
						}else{
							e.target.className = e.target.className + \" fifi teal accent-4 fifi\";
						}
					};
					window.onmouseout=function(e) {
						if($('.modal-overlay').length){
						}else{	
							e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");			  
						}					
					};
					";
				break;
		}
	}
}
if(!empty($post)){
	$pag->js = 
	"$('a').click(function(e){
		action = e.target.firstChild.data;
		pag = e.target.dataset.target;
		if(action == 'Agregar objeto'){
			loadlink2('/loadpag/{$editPag}/add');
		}
		else if(action == 'Modificar objeto'){
			loadlink2('/loadpag/{$editPag}/edit');
		}
		else if(action == 'Borrar objeto'){
			loadlink2('/loadpag/{$editPag}/del');

		}
	});";	
}
$pag->render();