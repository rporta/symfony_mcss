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
		$title['text'] = 'Borrar Pagina :';
		$title = new AppBundle\Utility\Obj\h($title);

	$header->addObj($br);
	$header->addObj($title);

	$main['shadow'] = "0";
	$main['container'] = TRUE;
	$main = new AppBundle\Utility\Obj\main($main);

	if(!empty($selectFile)){


		$form['textAling'] = 'c';
		$form['method'] = 'POST';
		$form['action'] = '/deletepag';
		$form = new AppBundle\Utility\Obj\form($form);

			$select['name'] = 'borrar_pagina';
			$select['option'] = $selectFile;
			$select = new AppBundle\Utility\Obj\inputSelect($select);

			$inputButton['mode'] = 'button';
			$inputButton['text'] = 'borrar';
			$inputButton['submit'] = true;
			$inputButton = new AppBundle\Utility\Obj\inputButton($inputButton);

				$iconButton = new AppBundle\Utility\Obj\icon();
				$iconButton->icon = "send";
				$iconButton->float = "r";

			$inputButton->addObj($iconButton);

		$form->addObj($select);
		$form->addObj($br);
		$form->addObj($inputButton);

		if(!empty($post)){
			$alert['redirectPath'] = "/deletepag";
			$alert = new AppBundle\Utility\Obj\alert($alert);

			$p['text'] = "Pagina '{$post['borrar_pagina']}' borrada exitosamente";
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
	}
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
$pag->render();