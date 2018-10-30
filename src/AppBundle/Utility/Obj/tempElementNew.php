<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;
use AppBundle\Utility\Obj\container;
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
use AppBundle\Utility\Obj\inputCheckboxes;
use AppBundle\Utility\Obj\row;
use AppBundle\Utility\Obj\col;
use AppBundle\Utility\Obj\pre;
use AppBundle\Utility\Obj\table;
use AppBundle\Utility\Obj\js;
/**
 * 
 */
class tempElementNew extends createClass
{
	protected $id;
	protected $type;
	protected $js;
	protected $objPag;
	protected $objFull;
	protected $nameObjAdd;
	protected $editar_pagina;
	protected $html;

	public function __construct($arg = NULL){
		$this->reset($arg);
	}
	public function reset($arg = NULL)
	{
		$this->id = 'tempElementNew-'.$this->createID(5);
		$this->type = 'tempElementNew';	
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->objPag = $arg['objPag'];
		$this->objFull = $arg['objFull'];
		$this->nameObjAdd = $arg['nameObjAdd'];
		$this->editar_pagina = $arg['editar_pagina'];
		$this->html = NULL;
		$this->refreshInfo();			
	}
	public function refreshInfo(){

		$objPag = $this->objPag;
		$objFull = $this->objFull;
		$nameObjAdd = $this->nameObjAdd;
		$editarPagina = $this->editar_pagina;

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
		$form['action'] = "/ajaxprocessadd";
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
		$optionFields['name'] = 'name';
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
		$optionFields['name'] = 'name';
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
			elseif (preg_match_all("/(text|js|src|alt|icon|class|href|dataActive|dataTarget)/", $v['name']) ) {
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
		$col['i']->s = "4";
		$col['i']->m = "4";
		$col['i']->l = "4";
		$col['i']->xl = "4";
		$col['i']->textAling = "c";
		$col['l'] = clone $col['i'];
		$col['c'] = clone $col['i'];

		$icon = new icon();
		$icon->float = "r";

		$aAdd = new a();
		$aAdd->class = 'btn';
		$aAdd->text = 'agregar';
		$aAdd->backgroundColor = 'green,7';
		$aDel = clone $aAdd;
		$aDel->text = 'borrar';
		$aDel->backgroundColor = 'red,5';
		$aMod = clone $aAdd;
		$aMod->text = 'modificar';
		$aMod->backgroundColor = 'blue,5';

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
		$icon->icon = "edit";
		$aMod->addObj($icon);
		$col['i']->addObj($aAdd);
		$col['c']->addObj($aMod);
		$col['l']->addObj($aDel);
		$row->addObj($col['i']);
		$row->addObj($col['c']);
		$row->addObj($col['l']);
		$form->addObj($row);
		$form->addObj($br);
		if(!empty($objFull['action'])){			
			$table->addHead('mover');
			$table->addHead('Acciones');
			$table->addHead('Objetos');

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

			$table->addRow(array($icon->html ,$inputSelectAction->html, $inputSelectObjet->html));

			$form->addObj($table);
		}
		else{
			$form->addObj($textNullAction);
		}
		
		$form->addObj($br);
		$js = new js();
		$js->js = array("$('#aceptar').click(function(){ $('#{$form->id}').submit(); }); $('#cancelar').click(function(){ var url = window.location.href.split('/'); window.location.href = url[0]+'//'+url[2]+'/editpag/{$editarPagina}';  });");
		$form->addObj($js);
		$container->addObj($form);
		$this->id = $form->id;

		/* set property */
		$this->getObj('js', $container->js);
		$out = $container->html.'<div class="center-align afbtn"><button id="aceptar" href="#" class="btn btn-flat">aceptar</button>    <button id="cancelar" href="#" class="btn btn-flat">cancelar</button></div><br>';
		$this->html = $out;
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
    public function __set($property, $value )
    {
        $this->$property = $value;
        $this->refreshInfo();
    }
    public function __get($property)
    {
        return $this->$property;
    }
    public function createName($listName, $type){
    	$name = $type.'_'.$this->createID(4);
    	if(in_array($name, $listName)){
    		return $this->createName($listName, $type);
    	}else{
    		return $name;
    	}
    }
}