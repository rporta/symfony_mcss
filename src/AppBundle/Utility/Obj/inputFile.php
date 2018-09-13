<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;

class inputFile extends createClass
{
	public $id;
	public $type;
	public $html;
	public $textColor;
	public $backgroundColor;
	public $activeBackgroundColor;
	public $text;
	public $textAling;	
	public $shadow;	
	public $cardPanel;	
	public $hoverable;
	public $placeholder;
	public $name;
	public $multiple;
	public $active;
	public $disabled;
	public $value;
	public $obj;
	public $js;

	public function __construct($arg = NULL){
		$this->reset($arg);
	}
	public function reset($arg = NULL)
	{
		$this->id = 'inputFile-'.$this->createID(5);
		$this->type = 'inputFile';
		$this->textColor = !isset($arg['textColor']) ? 'b-w-t,0' : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? NULL : $arg['backgroundColor'];
		$this->activeBackgroundColor = !isset($arg['activeBackgroundColor']) ? 'green,3' : $arg['activeBackgroundColor'];
		$this->text = !isset($arg['text']) ? 'file' : $arg['text'];
		$this->textAling = !isset($arg['textAling']) ? NULL : $arg['textAling'];
		$this->shadow = !isset($arg['shadow']) ? NULL : $arg['shadow'];	
		$this->cardPanel = !isset($arg['cardPanel']) ? NULL : $arg['cardPanel'];			
		$this->hoverable = !isset($arg['hoverable']) ? NULL : $arg['hoverable'];				
		$this->placeholder = !isset($arg['placeholder']) ? NULL : $arg['placeholder'];	
		$this->name = !isset($arg['name']) ? NULL : $arg['name'];			
		$this->multiple = !isset($arg['multiple']) ? NULL : $arg['multiple'];			
		$this->active = !isset($arg['active']) ? NULL : $arg['active'];		
		$this->disabled = !isset($arg['disabled']) ? NULL : $arg['disabled'];			
		$this->value = !isset($arg['value']) ? NULL : $arg['value'];		
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$id = $this->id;
		$textColor =  $this->textColors($this->textColor);
		$hexColor =  $this->hexColors($this->textColor);
		$backgroundColor =  $this->backgroundColors($this->backgroundColor);
		$hexBackgroundColor =  $this->hexColors($this->backgroundColor);
		$activeBackgroundColor =  $this->hexColors($this->activeBackgroundColor);
		$text = $this->text;
		$textAling =  $this->textAling($this->textAling);
		$shadow =  $this->shadow($this->shadow);	
		$cardPanel =  $this->cardPanel($this->cardPanel);
		$hoverable =  $this->hoverable($this->hoverable);		
		$placeholder =  $this->placeholderInputFields($this->placeholder);
		$name =  $this->nameInputFields($this->name);		
		$multiple =  $this->multipleInputFile($this->multiple);
		$active =  $this->activeInputFields($this->active);
		$disabled =  $this->disabledInputFields($this->disabled);
		$value = $this->valueInputFields($this->value);
		
		$tempHtml = 
		"<div class='file-field input-field' id='{ID}'>
			<div class='btn {TEXTCOLOR} {BACKGROUNDCOLOR}'>
				<span>{TEXT}</span>
				<input type='file' {MULTIPLE} {NAME}>
			</div>
			<div class='file-path-wrapper'>
				<input class='file-path validate {TEXTCOLOR}' type='text' {PLACEHOLDER} >
			</div>
		</div>";

		$search = array("{ID}", "{TEXTCOLOR}", "{HEXCOLOR}", "{HEXBACKGROUNDCOLOR}","{BACKGROUNDCOLOR}", "{ACTIVECOLOR}", "{TEXT}", "{TEXTALING}", "{SHADOW}", "{CARDPANEL}", "{HOVERABLE}", "{NAME}", "{ACTIVE}", "{DISABLED}", "{VALUE}","{PLACEHOLDER}", "{MULTIPLE}");
		$replace = array($id, $textColor, $hexColor, $hexBackgroundColor, $backgroundColor, $activeBackgroundColor, $text, $textAling, $shadow, $cardPanel, $hoverable, $name, $active, $disabled, $value, $placeholder, $multiple);

		$tempHtml = str_replace($search, $replace, $tempHtml);

		$this->html = $tempHtml;
	}
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}

}