<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;
/**
 * 
 */
class pre extends createClass
{
	protected $id;
	protected $type;
	protected $html;
	protected $textColor;
	protected $backgroundColor;
	protected $text;
	protected $flowText;	
	protected $js;

	public function __construct($arg = NULL){
		$this->reset($arg);
	}
	public function reset($arg = NULL)
	{
		$this->id = 'pre-'.$this->createID(5);
		$this->type = 'pre';
		$this->textColor = !isset($arg['textColor']) ? 'b-w-t,0' : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? 'b-w-t,2' : $arg['backgroundColor'];
		$this->text = !isset($arg['text']) ? '' : $arg['text'];
		$this->flowText = !isset($arg['flowText']) ? NULL : $arg['flowText'];		
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$id = $this->id;
		$textColor =  $this->textColors($this->textColor);
		$backgroundColor =  $this->backgroundColors($this->backgroundColor);
		$text = $this->text;
		$flowText =  $this->flowText($this->flowText);		
		$search = array("{ID}", "{TEXTCOLOR}", "{BACKGROUNDCOLOR}", "{TEXT}", "{FLOWTEXT}");
		$replace = array("{$id}", "{$textColor}", "{$backgroundColor}", "{$text}", "{$flowText}");
		$tempHtml = '<pre id="{ID}" class="{TEXTCOLOR} {BACKGROUNDCOLOR} {FLOWTEXT}">{TEXT}</pre>';
		$tempHtml = str_replace($search, $replace, $tempHtml);

		$this->html = $tempHtml;
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

