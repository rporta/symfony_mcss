<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;
/**
 * 
 */
class divider extends createClass
{
	public $id;
	public $type;
	public $html;
	public $backgroundColor;
	public $js;

	public function __construct($arg = NULL){
		$this->id = 'divider-'.$this->createID(5);
		$this->type = 'divider';
		$this->backgroundColor = !isset($arg['backgroundColor']) ? 'b-w-t,2' : $arg['backgroundColor'];
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->refreshInfo();			
	}
	public function refreshInfo(){
		$id = $this->id;
		$backgroundColor =  $this->backgroundColors($this->backgroundColor);

		$search = array("{ID}", "{BACKGROUNDCOLOR}");
		$replace = array("{$id}", "{$backgroundColor}");
		$tempHtml = '<div id="{ID}" class="divider {BACKGROUNDCOLOR}"></div>';
		$tempHtml = str_replace($search, $replace, $tempHtml);

		$this->html = $tempHtml;
	}
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}

}

