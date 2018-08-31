<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\createClass;
/**
 * 
 */
class span extends createClass
{
	public $id;
	public $type;
	public $html;
	public $textColor;
	public $backgroundColor;
	public $text;
	public $float;
	public $textAling;	
	public $shadow;	
	public $truncate;
	public $cardPanel;
	public $hoverable;
	public $flowText;
	public $js;

	public function __construct($arg = NULL){
		$this->id = 'span-'.$this->createID(5);
		$this->type = 'span';
		$this->textColor = !isset($arg['textColor']) ? NULL : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? NULL : $arg['backgroundColor'];
		$this->text = !isset($arg['text']) ? '' : $arg['text'];
		$this->float = !isset($arg['float']) ? NULL : $arg['float'];
		$this->textAling = !isset($arg['textAling']) ? NULL : $arg['textAling'];
		$this->shadow = !isset($arg['shadow']) ? NULL : $arg['shadow'];
		$this->truncate = !isset($arg['truncate']) ? NULL : $arg['truncate'];			
		$this->cardPanel = !isset($arg['cardPanel']) ? NULL : $arg['cardPanel'];
		$this->hoverable = !isset($arg['hoverable']) ? NULL : $arg['hoverable'];
		$this->flowText = !isset($arg['flowText']) ? NULL : $arg['flowText'];				
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$id = $this->id;
		$textColor =  $this->textColors($this->textColor);
		$backgroundColor =  $this->backgroundColors($this->backgroundColor);
		$text = $this->text;
		$float =  $this->float($this->float);
		$textAling =  $this->textAling($this->textAling);
		$shadow =  $this->shadow($this->shadow);	
		$truncate =  $this->truncate($this->truncate);	
		$cardPanel =  $this->cardPanel($this->cardPanel);		
		$hoverable =  $this->hoverable($this->hoverable);
		$flowText =  $this->flowText($this->flowText);		
		
		$search = array("{ID}", "{TEXTCOLOR}", "{BACKGROUNDCOLOR}", "{TEXT}", "{TEXTALING}", "{SHADOW}", "{TRUNCATE}", "{CARDPANEL}", "{HOVERABLE}", "{FLOAT}", "{FLOWTEXT}");
		$replace = array("{$id}", "{$textColor}", "{$backgroundColor}", "{$text}", "{$textAling}", "{$shadow}", "{$truncate}", "{$cardPanel}", "{$hoverable}", "{$float}", "{$flowText}");
		$tempHtml = '<span id="{ID}" class="{TEXTCOLOR} {BACKGROUNDCOLOR} {TEXTALING} {SHADOW} {TRUNCATE} {CARDPANEL} {HOVERABLE} {FLOAT} {FLOWTEXT}" >{TEXT}</span>';
		$tempHtml = str_replace($search, $replace, $tempHtml);

		$this->html = $tempHtml;
	}
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}

}

