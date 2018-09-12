<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;

class div extends createClass
{
	public $id;
	public $type;
	public $html;
	public $obj;
	public $textColor;
	public $backgroundColor;
	public $container;
	public $valign;	
	public $textAling;	
	public $float;
	public $name;
	public $shadow;	
	public $truncate;
	public $cardPanel;
	public $hoverable;
	public $style;
	public $js;

	public function __construct($arg = NULL){
		$this->type = 'div';
		$this->id = 'div-'.$this->createID(5);
		$this->textColor = !isset($arg['textColor']) ? NULL : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? NULL : $arg['backgroundColor'];
		$this->container = !isset($arg['container']) ? NULL : $arg['container'];
		$this->valign = !isset($arg['valign']) ? NULL : $arg['valign'];
		$this->textAling = !isset($arg['textAling']) ? NULL : $arg['textAling'];
		$this->float = !isset($arg['float']) ? NULL : $arg['float'];
		$this->name = !isset($arg['name']) ? NULL : $arg['name'];
		$this->shadow = !isset($arg['shadow']) ? NULL : $arg['shadow'];
		$this->truncate = !isset($arg['truncate']) ? NULL : $arg['truncate'];			
		$this->cardPanel = !isset($arg['cardPanel']) ? NULL : $arg['cardPanel'];			
		$this->hoverable = !isset($arg['hoverable']) ? NULL : $arg['hoverable'];			
		$this->style = !isset($arg['style']) ? NULL : $arg['style'];			
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$id = $this->id;
		$textColor =  $this->textColors($this->textColor);
		$backgroundColor =  $this->backgroundColors($this->backgroundColor);
		$container =  $this->container($this->container);
		$valign =  $this->valign($this->valign);	
		$textAling =  $this->textAling($this->textAling);	
		$float =  $this->float($this->float);	
		$shadow =  $this->shadow($this->shadow);	
		$truncate =  $this->truncate($this->truncate);			
		$cardPanel =  $this->cardPanel($this->cardPanel);
		$hoverable =  $this->hoverable($this->hoverable);		
		$style =  $this->style($this->style);		
		$name =  $this->nameInputFields($this->name);

		$objHtml = $this->getObj('html');
		$this->getObj('js');

		$search = array("{ID}", "{obj:html}", "{TEXTCOLOR}", "{BACKGROUNDCOLOR}", "{CONTAINER}", "{VALIGN}", "{TEXTALING}", "{FLOAT}", "{SHADOW}", "{TRUNCATE}", "{CARDPANEL}", "{HOVERABLE}", "{STYLE}", "{NAME}");
		$replace = array("{$id}", "{$objHtml}", "{$textColor}", "{$backgroundColor}", "{$container}", "{$valign}", "{$textAling}", "{$float}", "{$shadow}", "{$truncate}", "{$cardPanel}", "{$hoverable}", "{$style}", "{$name}");
		$tempHtml = '<div id="{ID}" class="{TEXTCOLOR} {BACKGROUNDCOLOR} {CONTAINER} {VALIGN} {TEXTALING} {FLOAT} {SHADOW} {TRUNCATE} {CARDPANEL} {HOVERABLE}" {STYLE} {NAME}>{obj:html}</div>';
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
				$objHtml = implode("", $objHtml);
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
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}

}

