<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;
use AppBundle\Utility\Obj\container;
use AppBundle\Utility\Obj\div;
use AppBundle\Utility\Obj\a;
use AppBundle\Utility\Obj\p;
use AppBundle\Utility\Obj\h;
use AppBundle\Utility\Obj\br;
use AppBundle\Utility\Obj\icon;
use AppBundle\Utility\Obj\divider;
use AppBundle\Utility\Obj\form;
use AppBundle\Utility\Obj\inputSelect;
use AppBundle\Utility\Obj\inputTextarea;
use AppBundle\Utility\Obj\inputFields;
use AppBundle\Utility\Obj\style;
use AppBundle\Utility\Obj\inputCheckboxes;
use AppBundle\Utility\Obj\inputButton;
use AppBundle\Utility\Obj\row;
use AppBundle\Utility\Obj\col;
use AppBundle\Utility\Obj\pre;
use AppBundle\Utility\Obj\table;
use AppBundle\Utility\Obj\js;
/**
 * 
 */
class tempElement extends createClass
{
	protected $id;
	protected $type;
	protected $js;
	protected $objPag;
	protected $objFull;
	protected $nameObjAdd;
	protected $editarPagina;
	protected $objDir;	
	protected $obj;
	protected $action;
	protected $mode;
	protected $html;

	public function __construct($arg = NULL){
		$this->reset($arg);
	}
	public function reset($arg = NULL)
	{
		$this->id = 'tempElement-'.$this->createID(5);
		$this->type = 'tempElement';	
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->objPag = !isset($arg['objPag']) ? NULL : $arg['objPag'];
		$this->objFull = !isset($arg['objFull']) ? NULL : $arg['objFull'];
		$this->nameObjAdd = !isset($arg['nameObjAdd']) ? NULL : $arg['nameObjAdd'];
		$this->editarPagina = !isset($arg['editar_pagina']) ? NULL : $arg['editar_pagina'];
		$this->objDir = !isset($arg['objDir']) ? NULL : $arg['objDir'];		
		$this->obj = !isset($arg['obj']) ? NULL : $arg['obj'];
		$this->action = !isset($arg['action']) ? NULL : $arg['action'];
		$this->mode = !isset($arg['mode']) ? NULL : $arg['mode'];
		$this->html = NULL;
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$obj = $this->obj;
		$objFull = $this->objFull;
		$objPag = $this->objPag;
		$objDir = $this->objDir;
		$editarPagina = $this->editarPagina;
		$nameObjAdd = $this->nameObjAdd;
		$action = $this->action;
		$mode = $this->modeTempElemet($this->mode);

		if($mode == 'listobj'){
			/* obj */
			$container = new div();

			$form['action'] = $action;
			$form['method'] = "POST";
			$form = new form($form);

			$optionFields = array();
			$optionFields['mode'] = '3';
			$optionFields['name'] = 'editar_pagina';
			$optionFields['text'] = 'editar_pagina';
			$optionFields['value'] = $editarPagina;
			$inputEditarPagina = new inputFields($optionFields);

			$optionFields = array();
			$optionFields['mode'] = '3';
			$optionFields['name'] = 'nameObjAdd';
			$optionFields['text'] = 'nameObjAdd';
			$optionFields['value'] = $nameObjAdd;
			$inputNameObjAdd = new inputFields($optionFields);


			$title['textAling'] = 'c';
			$title['textColor'] = 'grey,7';
			$title['size'] = '3';
			$title['text'] = "Seleccione un objeto de la lista :";
			$title = new h($title);

			$optionSelect = $temp = $name = array();
			$optionSelect['name'] = 'type';
			$optionSelect['text'] = 'type';
			foreach ($objDir as $obj) {
				if(!preg_match_all("/(tempElement|editJs)/", $obj['type'])){
					$temp[] = array('text' => $obj['type'], 'value' => $obj['type']);
				}
			}

			$optionSelect['option'] = $temp;
			$inputSelect = new inputSelect($optionSelect);


			$br = new br();
			/* action */

			$form->addObj($title);
			$form->addObj($br);
			$form->addObj($inputSelect);
			$form->addObj($inputEditarPagina);
			$form->addObj($inputNameObjAdd);
			$container->addObj($br);
			$container->addObj($form);
			$this->id = $form->id;
			/* set property */
			$this->getObj('js', $container->js);
			$out = $container->html;
			$this->html = $out;
		}
		elseif($mode == 'newobj'){
			foreach ($objPag as $o) {	
				$listName[] = $o['name'];
			}

			$newNameObjAdd = $this->createName($listName, $objFull['type']);

			/* obj */

			$container = new container();
			$title['textAling'] = 'c';
			$title['textColor'] = 'grey,7';
			$title['size'] = '2';
			$title['text'] = "Parametros :";
			$title = new h($title);
			$title2 = clone $title; 
			$title2->text = "Acciones :";
			$divider['backgroundColor'] = "grey,3";
			$divider = new divider($divider);
			$br = new br();
			$form['action'] = $action;
			$form['method'] = "POST";
			$form = new form($form);
			$inputS = $inputT = $inputC = $inputF = array();
			$optionFields = array();

			$optionFields['mode'] = '3';
			$optionFields['name'] = 'nameObjAdd';
			$optionFields['text'] = 'nameObjAdd';
			$optionFields['value'] = $nameObjAdd;
			$inputnameObjAdd = new inputFields($optionFields);		
			unset($optionFields);


			$optionFields['mode'] = '3';
			$optionFields['name'] = 'editar_pagina';
			$optionFields['text'] = 'editar_pagina';
			$optionFields['value'] = $editarPagina;
			$inputEditarPagina = new inputFields($optionFields);		
			unset($optionFields);
			$optionFields = array();
			$optionFields['active'] = TRUE;
			$optionFields['disabled'] = TRUE;
			$optionFields['name'] = 'type';
			$optionFields['text'] = 'type';
			$optionFields['value'] = $objFull['type'];
			$inputTypeH = new inputFields($optionFields);		
			unset($optionFields);
			$optionFields = array();
			$optionFields['active'] = TRUE;
			$optionFields['disabled'] = TRUE;
			$optionFields['name'] = 'nameVar';
			$optionFields['text'] = 'name';
			$optionFields['value'] = $newNameObjAdd;
			$inputNameH = new inputFields($optionFields);		
			unset($optionFields);

			$optionFields = array();
			$optionFields['mode'] = '3';
			$optionFields['name'] = 'type';
			$optionFields['text'] = 'type';
			$optionFields['value'] = $objFull['type'];
			$inputType = new inputFields($optionFields);		
			unset($optionFields);
			$optionFields = array();
			$optionFields['mode'] = '3';
			$optionFields['name'] = 'nameVar';
			$optionFields['text'] = 'name';
			$optionFields['value'] = $newNameObjAdd;
			$inputName = new inputFields($optionFields);		
			unset($optionFields);

			foreach ($objFull['param'] as $v) {
				if(!empty($v['value']) && is_array($v['value'])){
					$optionSelect = array();
					$optionSelect['name'] = $v['name'];
					$optionSelect['text'] = $v['name'];
					$temp = array();
					foreach ($v['value'] as $o) {
						if(preg_match_all("/(color)/" ,strtolower($v['name']))){
							$temp[] = array('text' => $o, 'value' => $o, 'backgroundColors' => $o);
						}else{
							$temp[] = array('text' => $o, 'value' => $o);
						}
					}
					$optionSelect['option'] = $temp;
					$inputS[] = new inputSelect($optionSelect);
				}
				elseif (preg_match_all("/(text|js|src|alt|icon|class|href|dataActive|dataTarget|repeat)/", $v['name']) ) {
					if($v['name'] == 'js'){
						$optionFields = array();
						$optionFields['name'] = $v['name'];
						$optionFields['text'] = $v['name'];
						$inputT[] = new inputTextarea($optionFields);
					}
					else{	
						$optionFields = array();
						$optionFields['active'] = TRUE;
						$optionFields['name'] = $v['name'];
						$optionFields['text'] = $v['name'];
						$inputF[] = new inputFields($optionFields);
					}
				
				}
				else {
					$optionCheckboxes = array();
					$optionCheckboxes['name'] = $v['name'];
					$temp = array();
					$insert = TRUE;
					$temp[] = array('text' => $v['name'], 'value' => '1');
					$optionCheckboxes['option'] = $temp;
					$inputC[] = new inputCheckboxes($optionCheckboxes);	
				}	
			}
			$col = array();
			$row = new row();
			$col['i'] = new col();
			$col['i']->s = "6";
			$col['i']->m = "6";
			$col['i']->l = "6";
			$col['i']->xl = "6";
			$col['i']->textAling = "l";
			$col['l'] = clone $col['i'];
			$col['i']->textAling = "r";

			$icon = new icon();
			$icon->float = "r";
			$aAdd = new a();
			$aAdd->class = 'btn';
			$aAdd->href = NULL;
			$aAdd->text = 'agregar';
			$aAdd->backgroundColor = 'green,7';
			$aDel = clone $aAdd;
			$aDel->text = 'borrar';
			$aDel->backgroundColor = 'red,5';
			$aDel->refreshId();

			$arrayJs[] = 
			"$(\"#{$aAdd->id}\").click( function(){ 
				x = $('tbody.ui-sortable').clone();
				arrayNameAction = x[0].lastChild.children[1].lastChild.children[0].children[3].name.split('-');
				arrayNameValue = x[0].lastChild.children[2].lastChild.children[0].children[3].name.split('-');

				arrayNameAction[0] = Number(arrayNameAction[0]) + 1; 
				arrayNameValue[0] = Number(arrayNameValue[0]) + 1;  

				x[0].lastChild.children[1].lastChild.children[0].children[3].name = arrayNameAction.join('-');
				x[0].lastChild.children[2].lastChild.children[0].children[3].name = arrayNameValue.join('-');
				
				x[0].lastChild.children[3].lastChild.children[0].children[0].id =
				Number(x[0].lastChild.children[3].lastChild.children[0].children[0].id) + 1;
				x[0].lastChild.children[3].lastChild.children[0].children[1].innerText =
				Number(x[0].lastChild.children[3].lastChild.children[0].children[1].innerText) + 1;

				x[0].lastChild.children[3].lastChild.children[0].children[1].htmlFor =
				Number(x[0].lastChild.children[3].lastChild.children[0].children[1].htmlFor) + 1;
				$('tbody.ui-sortable')[0].innerHTML += x[0].lastChild.outerHTML;
				x = 0;
				$('select').material_select(); 
			});";
			$arrayJs[] = "$(\"#{$aDel->id}\").click( function(){ 
				x = $('tbody.ui-sortable')[0].children;
				$.each(x, function( i, v ) {
					if(v.lastChild.lastChild.children[0].children[0].checked == true){
						$(v).remove();
					}
				});

			});";

			$js = new js();
			
			$table = new table();
			$table->center = TRUE;
			$table->sortable = TRUE;
			$textNullAction = new p();
			$textNullAction->text = 'No se encontraron acciones en este objeto';
			/* action */

			// $container->addObj($xbug);
			$container->addObj($br);
			$container->addObj($divider);
			$container->addObj($title);
			$container->addObj($br);
			$form->addObj($inputnameObjAdd);
			$form->addObj($inputEditarPagina);
			$form->addObj($inputTypeH);
			$form->addObj($inputNameH);
			$form->addObj($inputType);
			$form->addObj($inputName);
			if(!empty($inputS)){
				foreach ($inputS as $is) {
					$form->addObj($is);
				}
			}
			if(!empty($inputF)){
				foreach ($inputF as $if) {
					$form->addObj($if);
				}
			}
			if(!empty($inputT)){
				foreach ($inputT as $it) {
					$form->addObj($it);
				}
			}
			if(!empty($inputC)){
				foreach ($inputC as $ic) {
					$form->addObj($ic);
				}
			}
			
			$form->addObj($br);
			$form->addObj($divider);
			$form->addObj($title2);
			$form->addObj($br);
			$icon->icon = "add";
			$aAdd->addObj($icon);
			$icon->icon = "delete";
			$aDel->addObj($icon);
			$col['i']->addObj($aAdd);
			$col['l']->addObj($aDel);
				$row->addObj($col['i']);
				$row->addObj($col['l']);
			$form->addObj($row);
			$form->addObj($br);
			if(!empty($objFull['action'])){			
				$table->addHead('mover');
				$table->addHead('Acciones');
				$table->addHead('Objetos');
				$table->addHead('borrar');

				$icon->icon = "swap_vert";
				$icon->float = NULL;
				$icon->size = 1;
				$icon->textColor = 'cyan,3';

				$temp = array();
				foreach ($objFull['action'] as $kF => $aF) {
					$temp[] = array('text' => $aF['name'], 'value' => $aF['name']);
				}
				// $optionSelect['disabled'] = TRUE;
				$optionSelect['name'] = "0-action";
				$optionSelect['text'] = $aF['name'];
				$optionSelect['option'] = $temp;
				$inputSelectAction = new inputSelect($optionSelect);

				$temp = array();
				foreach ($objPag as $oP) {
					$temp[] = array('text' => "type : {$oP['type']} | name : {$oP['name']} ", 'value' => $oP['name']);
				}
				// $optionSelect['disabled'] = TRUE;
				$optionSelect['name'] = "0-objet";
				$optionSelect['text'] = $aF['name'];
				$optionSelect['option'] = $temp;
				$inputSelectObjet = new inputSelect($optionSelect);

				//MODIFICAR ACA
				$temp2[] = array('text' => '0', 'value' => '1');
				$optionCheckboxes['option'] = $temp2;
				${"inputBorrar0"} = new inputCheckboxes($optionCheckboxes);
				unset($temp2);
				
				$table->addRow(array($icon->html ,$inputSelectAction->html, $inputSelectObjet->html, ${"inputBorrar0"}->html));
				$form->addObj($table);
			}
			else{
				$form->addObj($textNullAction);
			}
			
			$form->addObj($br);
			
			$arrayJs[] = "$('#aceptar').click(function(){ $('#{$form->id}').submit(); }); $('#cancelar').click(function(){ var url = window.location.href.split('/'); window.location.href = url[0]+'//'+url[2]+'/editpag/{$editarPagina}';  });";
			$js->js = ($arrayJs);
			$form->addObj($js);
			$container->addObj($form);
			$this->id = $form->id;

			/* set property */
			$this->getObj('js', $container->js);
			$out = $container->html.'<div class="center-align afbtn"><button id="aceptar" href="#" class="btn btn-flat">aceptar</button>    <button id="cancelar" href="#" class="btn btn-flat">cancelar</button></div><br>';
			$this->html = $out;
		}
		elseif($mode == 'modobj'){
			/* obj */
			
			$container = new div();
			$title['textAling'] = 'c';
			$title['textColor'] = 'grey,7';
			$title['size'] = '2';
			$title['text'] = "Parametros :";
			$title = new h($title);
			$title2 = clone $title; 
			$title2->text = "Acciones :";
			$divider['backgroundColor'] = "grey,3";
			$divider = new divider($divider);
			$br = new br();
			$form['action'] = $action;
			$form['method'] = "POST";
			$form = new form($form);
			$inputS = $inputT = $inputC = $inputF = array();
			$optionFields = array();
			$optionFields['mode'] = '3';
			$optionFields['name'] = 'editar_pagina';
			$optionFields['text'] = 'editar_pagina';
			$optionFields['value'] = $editarPagina;
			$inputEditarPagina = new inputFields($optionFields);		
			unset($optionFields);
			$optionFields = array();
			$optionFields['active'] = TRUE;
			$optionFields['disabled'] = TRUE;
			$optionFields['name'] = 'type';
			$optionFields['text'] = 'type';
			$optionFields['value'] = $objFull['type'];
			$inputTypeH = new inputFields($optionFields);		
			unset($optionFields);
			$optionFields = array();
			$optionFields['active'] = TRUE;
			$optionFields['disabled'] = TRUE;
			$optionFields['name'] = 'nameVar';
			$optionFields['text'] = 'name';
			$optionFields['value'] = $obj['name'];
			$inputNameH = new inputFields($optionFields);		
			unset($optionFields);

			$optionFields = array();
			$optionFields['mode'] = '3';
			$optionFields['name'] = 'type';
			$optionFields['text'] = 'type';
			$optionFields['value'] = $objFull['type'];
			$inputType = new inputFields($optionFields);		
			unset($optionFields);
			$optionFields = array();
			$optionFields['mode'] = '3';
			$optionFields['name'] = 'nameVar';
			$optionFields['text'] = 'name';
			$optionFields['value'] = $obj['name'];
			$inputName = new inputFields($optionFields);		
			unset($optionFields);
			foreach ($objFull['param'] as $v) {
				if(!empty($v['value']) && is_array($v['value'])){
					$optionSelect = array();
					$optionSelect['name'] = $v['name'];
					$optionSelect['text'] = $v['name'];
					$temp = array();
					foreach ($v['value'] as $o) {
						$insert = FALSE;
						if(!empty($obj['param'])){							
							foreach ($obj['param'] as $op) {
								if($op['name'] == $v['name'] && $op['value'] == $o){
									if(preg_match_all("/(color)/" ,strtolower($v['name']))){
										$temp[] = array('active' => TRUE, 'text' => $o, 'value' => $o, 'backgroundColors' => $o);
									}else{
										$temp[] = array('active' => TRUE, 'text' => $o, 'value' => $o);
									}
									continue 2;
								}else{
									$insert = TRUE;
								}
							}
						}

						if($insert) {
							if(preg_match_all("/(color)/" ,strtolower($v['name']))){
								$temp[] = array('text' => $o, 'value' => $o, 'backgroundColors' => $o);
							}else{
								$temp[] = array('text' => $o, 'value' => $o);
							}
						}else{
							if(preg_match_all("/(color)/" ,strtolower($v['name']))){
								$temp[] = array('text' => $o, 'value' => $o, 'backgroundColors' => $o);
							}else{
								$temp[] = array('text' => $o, 'value' => $o);
							}
						}
					}
					$optionSelect['option'] = $temp;

					$inputS[] = new inputSelect($optionSelect);
				}
				elseif (preg_match_all("/(text|js|src|alt|icon|class|href|dataActive|dataTarget|repeat)/", $v['name']) ) {
					if($v['name'] == 'js'){
						$optionFields = array();
						$optionFields['name'] = $v['name'];
						$optionFields['text'] = $v['name'];
						if(!empty($obj['param'])){							
							foreach ($obj['param'] as $op) {
								if($op['name'] == $v['name']){
									$optionFields['value'] = $op['value'];
								}
							}
						}
						$inputT[] = new inputTextarea($optionFields);
					}
					else{	
						$optionFields = array();
						$optionFields['active'] = TRUE;
						$optionFields['name'] = $v['name'];
						$optionFields['text'] = $v['name'];
						if(!empty($obj['param'])){
							foreach ($obj['param'] as $op) {
								if($op['name'] == $v['name']){
									$optionFields['value'] = $op['value'];
								}
							}
						}
						$inputF[] = new inputFields($optionFields);
					}
				
				}
				else {
					$optionCheckboxes = array();
					$optionCheckboxes['name'] = $v['name'];
					$temp = array();
					$insert = TRUE;
					if(!empty($obj['param'])){						
						foreach ($obj['param'] as $op) {
							if($op['name'] == $v['name']){
								$temp[] = array('active' => TRUE ,'text' => $v['name'], 'value' => '1');
								$insert = FALSE;
							}
						}
					}
					if($insert){ $temp[] = array('text' => $v['name'], 'value' => '1'); }
					$optionCheckboxes['option'] = $temp;
					$inputC[] = new inputCheckboxes($optionCheckboxes);	
				}	
			}
			$col = array();
			$row = new row();
			$col['i'] = new col();
			$col['i']->s = "6";
			$col['i']->m = "6";
			$col['i']->l = "6";
			$col['i']->xl = "6";
			$col['i']->textAling = "l";
			$col['l'] = clone $col['i'];
			$col['i']->textAling = "r";

			$icon = new icon();
			$icon->float = "r";
			$aAdd = new a();
			$aAdd->class = 'btn';
			$aAdd->text = 'agregar';
			$aAdd->backgroundColor = 'green,7';
			$aDel = clone $aAdd;
			$aDel->text = 'borrar';
			$aDel->backgroundColor = 'red,5';
			$aDel->refreshId();

			$arrayJs[] = 
			"$(\"#{$aAdd->id}\").click( function(){ 
				x = $('tbody.ui-sortable').clone();
				arrayNameAction = x[0].lastChild.children[1].lastChild.children[0].children[3].name.split('-');
				arrayNameValue = x[0].lastChild.children[2].lastChild.children[0].children[3].name.split('-');

				arrayNameAction[0] = Number(arrayNameAction[0]) + 1; 
				arrayNameValue[0] = Number(arrayNameValue[0]) + 1;  

				x[0].lastChild.children[1].lastChild.children[0].children[3].name = arrayNameAction.join('-');
				x[0].lastChild.children[2].lastChild.children[0].children[3].name = arrayNameValue.join('-');
				
				x[0].lastChild.children[3].lastChild.children[0].children[0].id =
				Number(x[0].lastChild.children[3].lastChild.children[0].children[0].id) + 1;
				x[0].lastChild.children[3].lastChild.children[0].children[1].innerText =
				Number(x[0].lastChild.children[3].lastChild.children[0].children[1].innerText) + 1;

				x[0].lastChild.children[3].lastChild.children[0].children[1].htmlFor =
				Number(x[0].lastChild.children[3].lastChild.children[0].children[1].htmlFor) + 1;
				$('tbody.ui-sortable')[0].innerHTML += x[0].lastChild.outerHTML;
				x = 0;
				$('select').material_select(); 
			});";
			$arrayJs[] = "$(\"#{$aDel->id}\").click( function(){ 
				x = $('tbody.ui-sortable')[0].children;
				$.each(x, function( i, v ) {
					if(v.lastChild.lastChild.children[0].children[0].checked == true){
						$(v).remove();
					}
				});

			});";

			$js = new js();
			$js->js = ($arrayJs);
			$table = new table();
			$table->center = TRUE;
			$table->sortable = TRUE;
			$textNullAction = new p();
			$textNullAction->text = 'No se encontraron acciones en este objeto';
			/* action */

			$container->addObj($br);
			$container->addObj($divider);
			$container->addObj($title);
			$container->addObj($br);
			$form->addObj($inputEditarPagina);
			$form->addObj($inputTypeH);
			$form->addObj($inputNameH);
			$form->addObj($inputType);
			$form->addObj($inputName);
			if(!empty($inputS)){
				foreach ($inputS as $is) {
					$form->addObj($is);
				}
			}
			if(!empty($inputF)){
				foreach ($inputF as $if) {
					$form->addObj($if);
				}
			}
			if(!empty($inputT)){
				foreach ($inputT as $it) {
					$form->addObj($it);
				}
			}
			if(!empty($inputC)){
				foreach ($inputC as $ic) {
					$form->addObj($ic);
				}
			}
			
			$form->addObj($br);
			if(!empty($obj['action'])){
				if(is_array($obj['action'])){
					$form->addObj($divider);
					$form->addObj($title2);
					$form->addObj($br);
					$icon->icon = "add";
					$aAdd->addObj($icon);
					$icon->icon = "delete";
					$aDel->addObj($icon);
					$col['i']->addObj($aAdd);
					$col['l']->addObj($aDel);
					$row->addObj($col['i']);
					$row->addObj($col['l']);
					$form->addObj($row);
					$form->addObj($br);
					$table->addHead('mover');
					$table->addHead('Acciones');
					$table->addHead('Objetos');
					$table->addHead('borrar');

					$icon->icon = "swap_vert";
					$icon->float = NULL;
					$icon->size = 1;
					$icon->textColor = 'cyan,3';

					$inputSelectAction = $inputSelectObjet = array();

					foreach ($obj['action'] as $k => $a) {
						$temp = array();
						foreach ($objFull['action'] as $kF => $aF) {
							if($a['name'] == $aF['name']){
								$temp[] = array('active' => TRUE, 'text' => $aF['name'], 'value' => $aF['name']);
							}else{
								$temp[] = array('text' => $aF['name'], 'value' => $aF['name']);
							}
						}
						// $optionSelect['disabled'] = TRUE;
						$optionSelect['name'] = "{$k}-action";
						$optionSelect['text'] = '';
						$optionSelect['option'] = $temp;
						$inputSelectAction[$k] = new inputSelect($optionSelect);

						$temp = array();
						foreach ($objPag as $oP) {
							if($oP['name'] == $a['value']){
								$temp[] = array('active' => TRUE, 'text' => "type : {$oP['type']} | name : {$oP['name']} ", 'value' => $oP['name']);
							}else{
								$temp[] = array('text' => "type : {$oP['type']} | name : {$oP['name']} ", 'value' => $oP['name']);
							}
						}
						// $optionSelect['disabled'] = TRUE;
						$optionSelect['name'] = "{$k}-objet";
						$optionSelect['text'] = '';
						$optionSelect['option'] = $temp;
						$inputSelectObjet[$k] = new inputSelect($optionSelect);

						//MODIFICAR ACA
						$temp2[] = array('text' => $k, 'value' => '1');
						$optionCheckboxes['option'] = $temp2;
						${"inputBorrar{$k}"} = new inputCheckboxes($optionCheckboxes);
						unset($temp2);
						$table->addRow(array($icon->html ,$inputSelectAction[$k]->html, $inputSelectObjet[$k]->html, ${"inputBorrar{$k}"}->html));
					}
					$form->addObj($table);
				}else{
					$form->addObj($textNullAction);
				}
			}
			$form->addObj($br);
			$form->addObj($js);
			$container->addObj($form);
			$this->id = $form->id;
			/* set property */
			$this->getObj('js', $container->js);
			$out = $container->html;
			$this->html = $out;
		}
		elseif($mode == 'hiddenobjmod'){
			/* obj */
			$container = new container();


			$footer = new div();
			$footer->class = "modal-footer";
			$div = new div();
			$div->textAling = "c";

			$imputA = new inputButton();
			$imputA->class = "btn";
			$imputA->text = "aceptar";
			$imputA->flat = TRUE;

			$imputC = clone $imputA;
			$imputC->text = "cancelar";
			$imputC->href = "/editpag/{$editarPagina}";

			$imputA->submit = TRUE;
			$imputA->mode = "button";



			$form['action'] = $action;
			$form['method'] = "POST";
			$form = new form($form);

			$optionFields = array();
			$optionFields['mode'] = '3';
			$optionFields['name'] = 'editar_pagina';
			$optionFields['text'] = 'editar_pagina';
			$optionFields['value'] = $editarPagina;
			$inputEditarPagina = new inputFields($optionFields);
			$title['textAling'] = 'c';
			$title['textColor'] = 'grey,7';
			$title['size'] = '3';
			$title['text'] = "Seleccione un objeto de la lista :";
			$title = new h($title);

			$optionSelect = $temp = $name = array();
			$optionSelect['name'] = 'name';
			$optionSelect['text'] = 'type';
			foreach ($objPag as $obj) {
				if(!preg_match_all("/(tempElement|editJs)/", $obj['type'])){
					$temp[] = array('text' => $obj['type']." | ".$obj['name'], 'value' => $obj['name']);
				}
			}

			$optionSelect['option'] = $temp;
			$inputSelect = new inputSelect($optionSelect);


			$br = new br();
			/* action */

			$form->addObj($title);
			$form->addObj($br);
			$form->addObj($inputSelect);
			$form->addObj($inputEditarPagina);
			$div->addObj($imputA);
			$div->addObj($imputC);
			$footer->addObj($div);
			$form->addObj($br);
			$form->addObj($footer);

			$container->addObj($br);
			$container->addObj($form);
			$this->id = $form->id;
			/* set property */
			$this->getObj('js', $container->js);
			$out = $container->html;
			$this->html = $out;
		}
	}
	public function getObj($arg, $arg2 = NULL){
		$arg = strtolower((string)$arg);
		if($arg == 'html'){
			if(!empty($this->obj)){
				foreach ($this->obj as $idObj) {
					$objHtml[] = $idObj->html;
				}
				$objHtml = implode("", $objHtml);
			}
			else{
				$objHtml = "";
			}
			return $objHtml;
		}
		elseif($arg == 'js'){
			$this->js[] = implode("",$arg2);
		}
	}
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}
    public function createName($listName, $type){
    	$name = $type.'_'.$this->createID(4);
    	if(in_array($name, $listName)){
    		return $this->createName($listName, $type);
    	}else{
    		return $name;
    	}
    }
    public function __set($property, $value )
    {	
    	if($property == 'html'){
        	$this->$property = $value;
    	}else{    		
        	$this->$property = $value;
        	$this->refreshInfo();
    	}
    }
    public function __get($property)
    {
        return $this->$property;
    }
}