<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\createClass;

class inputButton extends createClass
{
	public $id;
	public $type;
	public $textColor;
	public $backgroundColor;
	public $text;
	public $flowText;
	public $href;
	public $float;
	public $dataAtive;
	public $js;
	public $html;
	public $class;
	public $waves;
	public $valign;
	public $mode;
	public $submit;
	public $name;
	public $large;
	public $floating;
	public $obj;

	public function __construct($arg = NULL){
		$this->id = 'inputButton-'.$this->createID(5);
		$this->type = 'inputButton';
		$this->textColor = !isset($arg['textColor']) ? NULL : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? NULL : $arg['backgroundColor'];
		$this->text = !isset($arg['text']) ? '' : $arg['text'];
		$this->flowText = !isset($arg['flowText']) ? NULL : $arg['flowText'];		
		$this->href = !isset($arg['href']) ? "#" : $arg['href'];
		$this->float = !isset($arg['float']) ? NULL : $arg['float'];
		$this->valign = !isset($arg['valign']) ? NULL : $arg['valign'];
		$this->dataActive = !isset($arg['dataActive']) ? NULL : $arg['dataActive'];
		$this->dataTarget = !isset($arg['dataTarget']) ? NULL : $arg['dataTarget'];
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->class = !isset($arg['class']) ? NULL : $arg['class'];
		$this->waves = !isset($arg['waves']) ? NULL : $arg['waves'];
		$this->mode = !isset($arg['mode']) ? '0' : $arg['mode'];
		$this->submit = !isset($arg['submit']) ? NULL : $arg['submit'];
		$this->name = !isset($arg['name']) ? NULL : $arg['name'];
		$this->large = !isset($arg['large']) ? NULL : $arg['large'];
		$this->floating = !isset($arg['floating']) ? NULL : $arg['floating'];
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$id = $this->id;
		$textColor =  $this->textColors($this->textColor);
		$backgroundColor =  $this->backgroundColors($this->backgroundColor);
		$href = $this->href;
		$float =  $this->float($this->float);
		$valign =  $this->valign($this->valign);
		$dataActive = $this->dataActive($this->dataActive);
		$dataTarget = $this->dataTarget($this->dataTarget);
		$text = $this->text;
		$flowText =  $this->flowText($this->flowText);	
		$class = $this->class;
		$waves = $this->waves($this->waves);
		$mode = $this->modeInputinputButton($this->mode);
		$submit = $this->submitInputButton($this->submit);
		$name =  $this->nameInputFields($this->name);
		$large =  $this->largeInputButton($this->large);
		$floating =  $this->floatingInputButton($this->floating);
		$objHtml = $this->getObj('html');
		$this->getObj('js');		

		$search = array("{ID}", "{TEXTCOLOR}", "{BACKGROUNDCOLOR}", "{TEXT}", "{HREF}", "{DATA:ACTIVE}", "{DATA:TARGET}", "{CLASS}", "{obj:html}", "{WAVES}", "{FLOAT}", "{VALIGN}", "{FLOWTEXT}", "{MODE}", "{SUBMIT}", "{NAME}", "{LARGE}", "{FLOATING}");
		$replace = array("{$id}", "{$textColor}", "{$backgroundColor}", "{$text}", "{$href}", "{$dataActive}", "{$dataTarget}", "{$class}", "{$objHtml}", "{$waves}", "{$float}", "{$valign}", "{$flowText}", "{$mode}", "{$submit}", "{$name}", "{$large}", "{$floating}");
		$tempHtml = '<{MODE} {SUBMIT} {NAME} id="{ID}" href="{HREF}" {DATA:ACTIVE} {DATA:TARGET} class="btn {LARGE} {FLOATING} {TEXTCOLOR} {BACKGROUNDCOLOR} {WAVES} {CLASS} {FLOAT} {VALIGN} {FLOWTEXT}">{TEXT} {obj:html}</{MODE}>';
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