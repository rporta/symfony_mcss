<?
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);
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