<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;
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
use AppBundle\Utility\Obj\inputCheckboxes;
use AppBundle\Utility\Obj\row;
use AppBundle\Utility\Obj\col;
use AppBundle\Utility\Obj\pre;
use AppBundle\Utility\Obj\table;
/**
 * 
 */
class tempElement extends createClass
{
	protected $id;
	protected $type;
	protected $js;
	protected $editar;
	protected $objPag;
	protected $objFull;
	protected $editarPagina;
	protected $obj;
	protected $html;

	public function __construct($arg = NULL){
		$this->reset($arg);
	}
	public function reset($arg = NULL)
	{
		$this->id = 'tempElement-'.$this->createID(5);
		$this->type = 'tempElement';	
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->obj = $arg['obj'];
		$this->objFull = $arg['objFull'];
		$this->objPag = $arg['objPag'];
		$this->editarPagina = $arg['editar_pagina'];
		$this->html = NULL;
		$this->refreshInfo();			
	}
	public function refreshInfo(){

		$obj = $this->obj;
		$objFull = $this->objFull;
		$objPag = $this->objPag;
		$editarPagina = $this->editarPagina;

		$xbug = new pre();
		$xbug->textAling = 'l';
		$xbug->textColor = 'light-green,12';
		$xbug->backgroundColor = "b-w-t,0";
		$xbug->text = $objPag;
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
		$form['action'] = "/ajaxprocess";
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
		$optionFields['name'] = 'name';
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
		$optionFields['name'] = 'name';
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
					if($insert) {
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
			elseif (preg_match_all("/(text|js|src|alt|icon|class|href|dataActive|dataTarget)/", $v['name']) ) {
				if($v['name'] == 'js'){
					$optionFields = array();
					$optionFields['name'] = $v['name'];
					$optionFields['text'] = $v['name'];
					foreach ($obj['param'] as $op) {
						if($op['name'] == $v['name']){
							$optionFields['value'] = $op['value'];
						}
					}
					$inputT[] = new inputTextarea($optionFields);
				}
				else{	
					$optionFields = array();
					$optionFields['active'] = TRUE;
					$optionFields['name'] = $v['name'];
					$optionFields['text'] = $v['name'];
					foreach ($obj['param'] as $op) {
						if($op['name'] == $v['name']){
							$optionFields['value'] = $op['value'];
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
				foreach ($obj['param'] as $op) {
					if($op['name'] == $v['name']){
						$temp[] = array('active' => TRUE ,'text' => $v['name'], 'value' => '1');
						$insert = FALSE;
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
		if(!empty($obj['action'])){
			if(is_array($obj['action'])){
				$table->addHead('mover');
				$table->addHead('Acciones');
				$table->addHead('Objetos');

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
					$optionSelect['text'] = $aF['name'];
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
					$optionSelect['text'] = $aF['name'];
					$optionSelect['option'] = $temp;
					$inputSelectObjet[$k] = new inputSelect($optionSelect);

					$table->addRow(array($icon->html ,$inputSelectAction[$k]->html, $inputSelectObjet[$k]->html));
				}
				$form->addObj($table);
			}else{
				$form->addObj($textNullAction);
			}
		}
		$form->addObj($br);
		$container->addObj($form);
		$this->id = $form->id;
		/* set property */
		$this->getObj('js', $container->js);
		$out = $container->html;
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

}