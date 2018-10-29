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
class tempElementList extends createClass
{
	protected $id;
	protected $type;
	protected $js;
	protected $nameObjAdd;
	protected $objDir;
	protected $editarPagina;
	protected $html;

	public function __construct($arg = NULL){
		$this->reset($arg);
	}
	public function reset($arg = NULL)
	{


		$this->id = 'tempElementList-'.$this->createID(5);
		$this->type = 'tempElementList';	
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->nameObjAdd = $arg['nameObjAdd'];
		$this->objDir = $arg['objDir'];
		$this->editarPagina = $arg['editar_pagina'];
		$this->html = NULL;
		$this->refreshInfo();			
	}
	public function refreshInfo(){

		$nameObjAdd = $this->nameObjAdd;
		$objDir = $this->objDir;
		$editarPagina = $this->editarPagina;


		/* obj */

		$container = new div();

		$form['action'] = "/ajaxadd2/{$editarPagina}";
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
			$temp[] = array('text' => $obj['type'], 'value' => $obj['type']);
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
    public function createName(){

    }
}