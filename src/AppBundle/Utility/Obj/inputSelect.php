<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\createClass;

class inputSelect extends createClass
{
	public $id;
	public $type;
	public $html;
	public $size;
	public $textColor;
	public $backgroundColor;
	public $text;
	public $textAling;	
	public $shadow;	
	public $truncate;
	public $cardPanel;	
	public $hoverable;
	public $placeholder;
	public $name;
	public $mode;
	public $active;
	public $disabled;
	public $textError;
	public $textSuccess;
	public $characterCounter;
	public $value;
	public $obj;
	public $js;

	public function __construct($arg = NULL){
		$this->id = 'inputSelect-'.$this->createID(5);
		$this->type = 'inputSelect';
		$this->textColor = !isset($arg['textColor']) ? 'b-w-t,0' : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? 'b-w-t,2' : $arg['backgroundColor'];
		$this->text = !isset($arg['text']) ? '' : $arg['text'];
		$this->textAling = !isset($arg['textAling']) ? NULL : $arg['textAling'];
		$this->shadow = !isset($arg['shadow']) ? NULL : $arg['shadow'];
		$this->truncate = !isset($arg['truncate']) ? NULL : $arg['truncate'];			
		$this->cardPanel = !isset($arg['cardPanel']) ? NULL : $arg['cardPanel'];			
		$this->hoverable = !isset($arg['hoverable']) ? NULL : $arg['hoverable'];			
		$this->placeholder = !isset($arg['placeholder']) ? NULL : $arg['placeholder'];			
		$this->name = !isset($arg['name']) ? NULL : $arg['name'];			
		$this->mode = !isset($arg['mode']) ? 'text' : $arg['mode'];			
		$this->active = !isset($arg['active']) ? NULL : $arg['active'];		
		$this->disabled = !isset($arg['disabled']) ? NULL : $arg['disabled'];		
		$this->textError = !isset($arg['textError']) ? NULL : $arg['textError'];		
		$this->textSuccess = !isset($arg['textSuccess']) ? NULL : $arg['textSuccess'];		
		$this->characterCounter = !isset($arg['characterCounter']) ? NULL : $arg['characterCounter'];		
		$this->value = !isset($arg['value']) ? NULL : $arg['value'];		
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$id = $this->id;
		$textColor =  $this->textColors($this->textColor);
		$backgroundColor =  $this->backgroundColors($this->backgroundColor);
		$text = $this->text;
		$textAling =  $this->textAling($this->textAling);
		$shadow =  $this->shadow($this->shadow);	
		$truncate =  $this->truncate($this->truncate);	
		$cardPanel =  $this->cardPanel($this->cardPanel);
		$hoverable =  $this->hoverable($this->hoverable);		
		$placeholder =  $this->placeholderInputFields($this->placeholder);		
		$name =  $this->nameInputFields($this->name);		
		$mode =  $this->modeInputFields($this->mode);
		$active =  $this->activeInputFields($this->active);
		$disabled =  $this->disabledInputFields($this->disabled);
		$textError =  $this->textErrorInputFields($this->textError);
		$textSuccess =  $this->textSuccessInputFields($this->textSuccess);
		$characterCounter = $this->characterCounterInputFields($this->characterCounter);
		$value = $this->valueInputFields($this->value);
		$objHtml = $this->getObj('html');
		$this->getObj('js');
		if(!is_null($characterCounter)){
			$this->js[] =  " $('#{$id}').characterCounter(); ";
		}

		$search = array("{ID}", "{TEXTCOLOR}", "{BACKGROUNDCOLOR}", "{TEXT}", "{TEXTALING}", "{SHADOW}", "{TRUNCATE}", "{CARDPANEL}", "{HOVERABLE}", "{MODE}", "{PLACEHOLDER}", "{NAME}", "{obj:html}", "{ACTIVE}", "{DISABLED}", "{TEXTERROR}", "{TEXTSUCCESS}", "{CHARACTERCOUNTER}", "{VALUE}");
		$replace = array($id, $textColor, $backgroundColor, $text, $textAling, $shadow, $truncate, $cardPanel, $hoverable, $mode, $placeholder, $name, $objHtml, $active, $disabled, $textError, $textSuccess, $characterCounter, $value);

		$tempHtml = 
		'<div class="input-field">
			{obj:html}
			<textarea {PLACEHOLDER} {NAME} {DISABLED} {TEXTERROR} {TEXTSUCCESS} {CHARACTERCOUNTER} {VALUE} id="{ID}" type="{MODE}" class="materialize-textarea {TEXTCOLOR} {BACKGROUNDCOLOR} {TEXTALING} {SHADOW} {TRUNCATE} {CARDPANEL} {HOVERABLE} {ACTIVE} "></textarea>
			<label for="{TEXT}">{TEXT} </label>
        </div>';
		$tempHtml = str_replace($search, $replace, $tempHtml);

		$this->html = $tempHtml;
	}
	public function addObj($obj){
		$this->obj[] = $obj;
		$this->refreshInfo();
	}

	public function delObj($obj){
		$reversed = array_reverse($this->obj , 1);
		foreach ($reversed as $key => $objR) {
			if($objR->type == $obj->type && $objR->id == $obj->id){
				unset($this->obj[$key]);
				break;
			}
		}
		$this->refreshInfo();
	}
	public function getObj($arg){
		$arg = strtolower((string)$arg);
		if($arg == 'html'){
			if(!empty($this->obj)){
				foreach ($this->obj as $idObj) {
					$idObj->class = "prefix";
					$idObj->refreshInfo();
					$objHtml[] = $idObj->html;
				}
				$objHtml = implode(" ", $objHtml);
			}
			else{
				$objHtml = "";
			}
			return $objHtml;
		}
		elseif($arg == 'js'){
			if(!empty($this->obj)){
				foreach ($this->obj as $Obj) {
					foreach ($Obj->js as $js) {
						if(!in_array($js, $this->js)){
							$this->js[] = $js;
						}
					}
				}
			}
		}
	}	
}