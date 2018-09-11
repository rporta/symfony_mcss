<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;

class br extends createClass
{
	public $id;
	public $type;
	public $html;	
	public $repeat;
	public $js;

	function __construct($arg = NULL)
	{
		$this->id = 'br-'.$this->createID(5);
		$this->type = 'br';
		$this->repeat = !isset($arg['repeat']) ? 1 : $arg['repeat'];
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->refreshInfo();
	}
	public function refreshInfo($arg = null){
		$repeat = $this->repeat;
		$outHtml =  str_repeat("<br>", $repeat);
		$this->html = $outHtml;
	}
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}
	
}