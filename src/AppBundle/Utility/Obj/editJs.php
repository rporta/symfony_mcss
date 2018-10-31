<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;
/**
 * 
 */
class editJs extends createClass
{
	protected $id;
	protected $type;
	protected $js;
	protected $editar;
	protected $html;

	public function __construct($arg = NULL){
		$this->reset($arg);
	}
	public function reset($arg = NULL)
	{
		$this->id = 'editJs-'.$this->createID(5);
		$this->type = 'editJs';	
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->editar = $arg;
		$this->html = NULL;
		$this->refreshInfo();			
	}
	public function refreshInfo(){

	}
	public function getJs($arg = NULL){
		$editar = $this->editar;
		$js['default'] = 
		"$('body').append('<form style=\"display: none;\" id=\"form-send\" action=\"/editpag\" method=\"POST\"><input type=\"hidden\" name=\"editar_pagina\" value=\"{$editar}\"></form>');
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
				function getParent(e, lParentNode = 0){
					if(e.nodeName == 'HTML'){
						return 0;
					}
					lParentNode++;
					parent = e.parentNode.nodeName;
					if(parent == 'NAV'){
						return lParentNode;
					}
					else if(parent == 'BODY'){
						return 0;
					}
					else{
						return getParent(e.parentNode, lParentNode);
					}
				}
				function setHtmlSubElementNav(e, isNav, element){
					if(isNav == 0){
						return element;
					}else{

						nodeName = e.parentNode.nodeName;

						if(isNav == 1){
							className = e.parentNode.className.replace(\"right\", \"\");
							className = className.replace(\"left\", \"\");
						}else{
							className = e.parentNode.className
						}

						tagIni = \"<\" + nodeName + \" class='\"+ className +\"' >\";

						tagEnd = \"<\/\"+nodeName+\">\";

						element = tagIni+element+tagEnd;

						isNav--;
						return setHtmlSubElementNav(e.parentNode, isNav, element);		
					}


				}
				function setObj(e, n = 0, obj = []){
					if(n == 0){
						if(e.id.length == 0){
							return setObj(e.parentNode, n, obj);
						}
						else{
							propery = {};
							type = e.id.split(\"-\");
							if(type[0] == 'media'){
								propery.id = e.id;
								propery.className = e.className;
								propery.url = e.currentSrc;

								obj[n] = propery;
								n++;
								return setObj(e.parentNode, n, obj);
							}
							else{
								propery.id = e.id;
								propery.text = e.firstChild.data;
								propery.datasetActivate = e.dataset.activates;
								/*propery.nodeName = e.nodeName;*/
								propery.className = e.className;
								obj[n] = propery;
								n++;
								return setObj(e.parentNode, n, obj);	
							}						
						}
					}
					else{
						if(e.nodeName == 'BODY'){
							obj.reverse();
							return {\"json\" : obj};
						}
						else{
							if(e.id.length == 0){
								return setObj(e.parentNode, n, obj);								
							}
							else{							
								propery = {}
								propery.id = e.id;
								propery.text = e.firstChild.data;
								propery.datasetActivate = e.dataset.activates;
								/*propery.nodeName = e.nodeName;*/
								propery.className = e.className;
								obj[n] = propery;
								n++;
								return setObj(e.parentNode, n, obj );					
							}
						}						
					}					
				}";
			$js['add'] = 
			"
				$(document).click(function(e){
					e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");
					s = e;
					isNav = getParent(s.target);
					if(isNav > 0){
						subElement = s.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\");
						element = setHtmlSubElementNav(s.target, isNav, subElement);
					}else{
						element = s.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\");
					}
					if( $(\"#alert-72197\").length){
											
					}
					else{
						if(e.target.nodeName == 'HTML'){

							obj = [];
							propery = {};
							propery.id = e.target.lastChild.id;
							propery.className = e.target.lastChild.className;

							obj[0] = propery;

							ObjHtmlElement = {\"json\" : obj};

						}else{
							ObjHtmlElement = setObj(e.target);
						}
						/*agrego alerta*/
						$('body').append(
							'<div id=\"alert-72197\" style=\"overflow-y: hidden;\" class=\" white modal modal-fixed-footer\"><div class=\"modal-content center-align \"><p id=\"p-b41dd\" class=\"black-text transparent center-align\">Desea agregar un nuevo objeto dentro de este objeto : <\/p><br>'+element+'<\/div><div class=\"modal-footer \"><div class=\"center-align afbtn\"><button id=\"inputButton-ceab0\" href=\"#\" class=\"btn btn-flat\">aceptar<\/button>    <button id=\"inputButton-ceab1\" href=\"#\" class=\"btn btn-flat modal-action modal-close\">cancelar<\/button></div><\/div><script type=\"text/javascript\">$(\"#alert-72197\").modal({complete: function(e) {  $(\"#alert-72197\").remove(); }}); $(\"#alert-72197\").modal(\"open\");  $(\"#inputButton-ceab0\").click(function(){ preloaderFull(\"on\", pF);  $.ajax({ url: \"/ajaxadd/{$editar}\", data: ObjHtmlElement, dataType:\"JSON\", type: \"POST\", success: function(data) {setTimeout(function(){ preloaderFull(\"off\", pF); }, 500); $(\".modal-content\")[0].innerHTML += data[0]; eval(data[1]); $(\"#inputButton-ceab0\").remove(); $(\".afbtn\").prepend(\'<button id=\"agregar\" href=\"#\" class=\"btn btn-flat\">agregar<\/button>\');$(\"#agregar\").click( function(){ $(\"#\"+data[2]+\"\").submit(); } );/*--------------aca va funcion click para enviar formulario---------------*/console.log($(\"#inputButton-ceab0\")); console.log($(\"#\"+data[2]+\"\"));} });});<\/script><\/div>'
						);	
					}
					});

					";
			$js['edit'] = 
			"
				$(document).click(function(e){
					e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");
					s = e;
					isNav = getParent(s.target);
					if(isNav > 0){
						subElement = s.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\");
						element = setHtmlSubElementNav(s.target, isNav, subElement);
					}else{
						element = s.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\");
					}
					if( $(\"#alert-72197\").length){
											
					}
					else{
						if(e.target.nodeName == 'HTML'){

							obj = [];
							propery = {};
							propery.id = e.target.lastChild.id;
							propery.className = e.target.lastChild.className;

							obj[0] = propery;

							ObjHtmlElement = {\"json\" : obj};

						}else{
							ObjHtmlElement = setObj(e.target);
						}
						/*agrego alerta*/
						$('body').append(
							'<div id=\"alert-72197\" style=\"overflow-y: hidden;\" class=\" white modal modal-fixed-footer\"><div class=\"modal-content center-align \"><p id=\"p-b41dd\" class=\"black-text transparent center-align\">Desea modificar este objeto : <\/p><br>'+element+'<\/div><div class=\"modal-footer \"><div class=\"center-align afbtn\"><button id=\"inputButton-ceab0\" href=\"#\" class=\"btn btn-flat\">aceptar<\/button>    <button id=\"inputButton-ceab1\" href=\"#\" class=\"btn btn-flat modal-action modal-close\">cancelar<\/button></div><\/div><script type=\"text/javascript\">$(\"#alert-72197\").modal({complete: function(e) {  $(\"#alert-72197\").remove(); }}); $(\"#alert-72197\").modal(\"open\");  $(\"#inputButton-ceab0\").click(function(){ preloaderFull(\"on\", pF);  $.ajax({ url: \"/ajaxmod/{$editar}\", data: ObjHtmlElement, dataType:\"JSON\", type: \"POST\", success: function(data) {setTimeout(function(){ preloaderFull(\"off\", pF); }, 500); $(\".modal-content\")[0].innerHTML += data[0]; eval(data[1]); $(\"#inputButton-ceab0\").remove(); $(\".afbtn\").prepend(\'<button id=\"modificar\" href=\"#\" class=\"btn btn-flat\">modificar<\/button>\');$(\"#modificar\").click( function(){ $(\"#\"+data[2]+\"\").submit(); } );/*--------------aca va funcion click para enviar formulario---------------*/console.log($(\"#inputButton-ceab0\")); console.log($(\"#\"+data[2]+\"\"));} });});<\/script><\/div>'
						);	
					}
					});

					";
			$js['del'] = 
			"
				$(document).click(function(e){
					if(e.target.nodeName !== 'HTML'){
						e.target.className = e.target.className.replace(\" fifi teal accent-4 fifi\", \"\");
						s = e;
						isNav = getParent(s.target);
						if(isNav > 0){
							subElement = s.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\");
							element = setHtmlSubElementNav(s.target, isNav, subElement);
						}else{
							element = s.target.outerHTML.replace(\" fifi teal accent-4 fifi\", \"\");
						}
						if( $(\"#alert-72197\").length){
												
						}
						else{
							ObjHtmlElement = setObj(e.target);
							/*agrego alerta*/
							$('body').append(
								'<div id=\"alert-72197\" style=\"overflow-y: hidden;\" class=\" white modal modal-fixed-footer\"><div class=\"modal-content center-align \"><p id=\"p-b41dd\" class=\"black-text transparent center-align\">Desea eliminar este objeto : '+element+'<\/p><\/div><div class=\"modal-footer \"><div class=\"center-align\"><button id=\"inputButton-ceab0\" href=\"#\" class=\"btn btn-flat\">aceptar<\/button>    <button id=\"inputButton-ceab1\" href=\"#\" class=\"btn btn-flat modal-action modal-close\">cancelar<\/button></div><\/div><script type=\"text/javascript\">$(\"#alert-72197\").modal({complete: function(e) {  $(\"#alert-72197\").remove(); }}); $(\"#alert-72197\").modal(\"open\");  $(\"#inputButton-ceab0\").click(function(){ $.ajax({ url: \"/ajaxdel/{$editar}\", data: ObjHtmlElement, dataType:\"JSON\", type: \"POST\", success: function(result){ $(\"#form-send\").submit(); } });});<\/script><\/div>'
							);	
						}
					}
					}); 

					";
		switch (strtolower((string)$arg)) {
			case "0":
			case "default":
				$out = $js['default'];
				break;
			case "1":
			case "add":
				$out = $js['add']; 
				break;
			case "2":
			case "edit":
				$out = $js['edit'];
				break;
			case "3":
			case "del":
				$out = $js['del'];
				break;
		}
		return is_null($arg) ? NULL : $out;

	}

	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}
    public function __set($property, $value )
    {
        $this->$property = $value;
        $this->refreshInfo();
    }
    public function __get($property)
    {
        return $this->$property;
    }

}

