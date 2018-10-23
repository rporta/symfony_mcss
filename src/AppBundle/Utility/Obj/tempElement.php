<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;
use AppBundle\Utility\Obj\div;
use AppBundle\Utility\Obj\p;
use AppBundle\Utility\Obj\br;
use AppBundle\Utility\Obj\divider;
use AppBundle\Utility\Obj\form;
use AppBundle\Utility\Obj\inputSelect;
use AppBundle\Utility\Obj\inputTextarea;
use AppBundle\Utility\Obj\inputFields;
use AppBundle\Utility\Obj\inputCheckboxes;
/**
 * 
 */
class tempElement extends createClass
{
	protected $id;
	protected $type;
	protected $js;
	protected $editar;
	protected $objFull;
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
		$this->html = NULL;
		$this->refreshInfo();			
	}
	public function refreshInfo(){

		$obj = $this->obj;
		$objFull = $this->objFull;

		$container = new div();

		$type['textAling'] = 'l';
		$type['size'] = '2';
		$type['text'] = "Type : {$objFull['type']}";
		$type = new p($type);
		$divider['backgroundColor'] = "grey,3";
		$divider = new divider($divider);
		$br = new br();

		$name['textAling'] = 'l';
		$name['size'] = '2';
		$name['text'] = "Name : {$obj['name']}";
		$name = new p($name);

		$form['method'] = "POST";
		$form = new form($form);

		$inputS = $inputT = $inputC = $inputF = array();

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

		/* action */

		$container->addObj($br);
		$container->addObj($divider);
		$container->addObj($type);
		$container->addObj($name);
		$container->addObj($br);
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
		$container->addObj($form);

		$out = $container->html;

		$this->html = $out;
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

