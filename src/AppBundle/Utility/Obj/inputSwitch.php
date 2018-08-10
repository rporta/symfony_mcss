<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\createClass;

class inputSwitch extends createClass
{
	public $id;
	public $type;
	public $html;
	public $textColor;
	public $backgroundColor;
	public $text;
	public $textAling;	
	public $shadow;	
	public $truncate;
	public $cardPanel;	
	public $hoverable;
	public $name;
	public $option;
	public $disabled;
	public $active;
	public $js;

	public function __construct($arg = NULL){
		$this->id = 'inputSwitch-'.$this->createID(5);
		$this->type = 'inputSwitch';
		$this->textColor = !isset($arg['textColor']) ? 'b-w-t,0' : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? 'grey,7' : $arg['backgroundColor'];
		$this->text = !isset($arg['text']) ? '' : $arg['text'];
		$this->textAling = !isset($arg['textAling']) ? NULL : $arg['textAling'];
		$this->shadow = !isset($arg['shadow']) ? NULL : $arg['shadow'];
		$this->truncate = !isset($arg['truncate']) ? NULL : $arg['truncate'];			
		$this->cardPanel = !isset($arg['cardPanel']) ? NULL : $arg['cardPanel'];			
		$this->hoverable = !isset($arg['hoverable']) ? NULL : $arg['hoverable'];			
		$this->name = !isset($arg['name']) ? NULL : $arg['name'];			
		$this->option = !isset($arg['option']) ? NULL : $arg['option'];		
		$this->disabled = !isset($arg['disabled']) ? NULL : $arg['disabled'];		
		$this->active = !isset($arg['active']) ? NULL : $arg['active'];		
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$id = $this->id;
		$textColor =  $this->textColors($this->textColor);
		$backgroundColor[0] =  $this->hexColors($this->backgroundColor);
		$backgroundColor[1] = (explode(",", $this->backgroundColor)[1] > 7) ? $this->hexColors(explode(",", $this->backgroundColor)[0].",3") : $this->hexColors(explode(",", $this->backgroundColor)[0].",9") ;
		$text = $this->text;
		$textAling =  $this->textAling($this->textAling);
		$shadow =  $this->shadow($this->shadow);	
		$truncate =  $this->truncate($this->truncate);	
		$cardPanel =  $this->cardPanel($this->cardPanel);
		$hoverable =  $this->hoverable($this->hoverable);		
		$name =  $this->nameInputFields($this->name);		
		$disabled =  $this->disabledInputSwitch($this->disabled);		
		$active =  $this->activeInputSwitch($this->active);		
		$inputSwitchHtml = $this->getOptions($this->option);

		$tempHtml = 
		'<style>
			.switch label .lever::before {
				background-color: {BACKGROUNDCOLOR:0};
			}
			.switch label input[type="checkbox"]:checked + .lever {
				background-color: {BACKGROUNDCOLOR:0};
			}
			.switch label input[type="checkbox"]:checked + .lever::after {
				background-color: {BACKGROUNDCOLOR:1};
			}

		</style>
		<div id="{ID}" class="switch">
			<label class="{TEXTCOLOR}">
				{INPUTSWITCH:HTML}
			</label>
        </div>';

        $tempHtml = str_replace("{INPUTSWITCH:HTML}", $inputSwitchHtml, $tempHtml);


		$search = array("{ID}", "{TEXTCOLOR}", "{BACKGROUNDCOLOR:0}", "{BACKGROUNDCOLOR:1}" , "{TEXT}", "{TEXTALING}", "{SHADOW}", "{TRUNCATE}", "{CARDPANEL}", "{HOVERABLE}", "{NAME}", "{DISABLED}", "{ACTIVE}");
		$replace = array($id, $textColor, $backgroundColor[0], $backgroundColor[1], $text, $textAling, $shadow, $truncate, $cardPanel, $hoverable, $name, $disabled, $active);


		$tempHtml = str_replace($search, $replace, $tempHtml);
		$this->html = $tempHtml;
	}
	public function getOptions($arg){

		$tempHtml = 
		'{TEXT:0}
			<input {NAME} type="checkbox" {DISABLED} {ACTIVE} />
			<span class="lever"></span>
		{TEXT:1}';

		foreach ($arg as $i => $option) {
			$text[$i] = NULL;
			foreach ($option as $property => $data) {
				if($property == 'text') $text[$i] = $data;						
			}
		}
		$search = array("{TEXT:0}", "{TEXT:1}", "{DISABLED}", "{ACTIVE}");
		$replace = array($text[0], $text[1]);
		$objHtml[] = str_replace($search, $replace, $tempHtml);

		$objHtml = implode("", $objHtml);

		return $objHtml;
	}	
}