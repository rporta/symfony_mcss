<?
namespace AppBundle\Service;

use AppBundle\Utility\dirbase\dirBase;
use AppBundle\Service\ObjParam;

class Obj extends ObjParam
{
	public function scanObjFile($filePag){
		$reg_exp[] = "(\\$)(.+)(\s+\\=\s+)(new\s+AppBundle\\\Utility\\\Obj\\\)(.+)(\\()(.*)(\\)\\;)";
		$reg_exp[] = "(\\$)(.+)(\s+\\=\s+)(new\s+AppBundle\\\Utility\\\Obj\\\(.+)(\\()(.*)(\\)\\;)|clone\s+(\\$)(.+))";

		$reg_exp[] = "([^\/\/\040](\\$)(.+)(\s+\\=\s+)(new\s+AppBundle\\\Utility\\\Obj\\\(.+)(\\()(.*)(\\)\\;)|clone\s+(\\$)(.+)))";

		if(preg_match_all("/{$reg_exp[2]}/", $filePag, $out)){
			foreach ($out[3] as $key => $value) {
				$result[$key]['name'] = $value;
			}
			foreach ($out[6] as $key => $value) {
				if(!empty($value)){	
					$result[$key]['type'] = $value;
				}
				else{
					//busco el tipo de objeto que se clona
					preg_match_all("/(clone)(\s+)(\\$)(.+)(\\;)/", $out[5][$key], $name);
					$name = $name[4][0];
					foreach ($out[3] as $keyx => $valuex) {
						if($valuex == $name){
							$result[$key]['type'] = $out[6][$keyx];
						}
					}
				}
			}
			foreach ($out[8] as $key => $value) {
				$result[$key]['param'] = $value;
			}
			$this->getParam($result, $filePag);
			$this->getAction($result, $filePag);
			//se elmina objet editJs
			$end = end($result);
			if($end['type'] == 'editJs') array_pop($result);
			return $result;
		}else{
			return NULL;
		}		
	}
	public function getParam(&$result, $filePag){
		$temp_reg_exp[] = "([^\/\/\040](\{PARAM}\[.)(.+)(.\])(\040+\=\040+)(.+)\;)";
		$temp_reg_exp[] = "([^\/\/\040](\\$)({PARAM})(->)(.+)(\040+\=\040+)(.+)\;)";



		foreach ($result as $key => &$value) {
			if(!empty($value['param'])){
				$reg_exp = str_replace("{PARAM}", $value['param'], $temp_reg_exp[0]);
				if(preg_match_all("/{$reg_exp}/", $filePag, $out)){
					foreach ($out[3] as $key1 => $value1) {
						$param[$key1]['name'] = $value1;
					}
					foreach ($out[6] as $key2 => $value2) {
						$param[$key2]['value'] =  str_replace(array('"', "'"), "", $value2);
					}
					$result[$key]['param'] = $param;
					unset($param);
					
				}
			}
			else{
				$reg_exp = str_replace("{PARAM}", $value['name'], $temp_reg_exp[1]);
				if(preg_match_all("/{$reg_exp}/", $filePag, $out2)){
					foreach ($out2[5] as $key1 => $value1) {
						$param[$key1]['name'] = $value1;
					}
					foreach ($out2[7] as $key2 => $value2) {
						$param[$key2]['value'] = str_replace(array('"', "'"), "", $value2);
					}
					$result[$key]['param'] = $param;
					unset($param);
				}
			}
		}
	}
	public function getAction(&$result, $filePag){
		$temp_reg_exp = "([^\/\/\040](\\$)({PARAM})(->)([a-zA-Z]+)(\\()(\\$)(.+)(\\)))";
		foreach ($result as $key => &$value) {
			if(!empty($value['name'])){
				$reg_exp = str_replace("{PARAM}", $value['name'], $temp_reg_exp);
				if(preg_match_all("/{$reg_exp}/", $filePag, $out)){

					foreach ($out[5] as $key1 => $value1) {
						$action[$key1]['name'] = $value1;
					}
					foreach ($out[8] as $key2 => $value2) {
						$action[$key2]['value'] = $value2;
					}
					$result[$key]['action'] = $action;
					unset($action);
					
				}
			}
		}		
	}
	public function scanObjDir(dirbase $objDir){
		$temp_reg_exp = "(class)(\s+)([a-zA-Z]+)";
		$arrayFiles = $objDir->getProperty('arrayFile');

		foreach ($arrayFiles as $key => $value) {
			$filePag = $objDir->getObj($value)->viewFile();
			if(preg_match_all("/{$temp_reg_exp}/", $filePag, $out)){
				$result[$key]['type'] = $out[3][0];
			}
			$result[$key]['param'] = $this->getParamClass($filePag, $result[$key]['type']);
			$result[$key]['action'] = $this->getActionClass($filePag);
		}

		return $result;
	}
	public function orderKey($arg){
		$out = array();
		$nOld = $p = 0;
		foreach ($arg as $v) {
			$n = explode(",", $v)[1];
			if($n > 0){
				if($n - 1 == $nOld){
					$out[] = $v;
				}elseif($n - 1 == $nOld + 1){
					$tempV = explode(",", $v)[0];
					if($p == 0){
						$out[] = $tempV.",".($n - 1);
						$out[] = $tempV.",".($n);
						$p = 1;
					}else{
						$out[] = $tempV.",".($n - 1);
					}
				}
			}else{
				$out[] = $v;
			}
			$nOld = explode(",", $v)[1];
		}
		return $out;
	}

	public function getParamClass($filePag, $type){
		$temp_reg_exp = "(\\$)([a-zA-Z]+)(->)([a-zA-Z]+)(\s+\=\s+)(!isset)";

		if(preg_match_all("/{$temp_reg_exp}/", $filePag, $out)){
			foreach ($out[4] as $i => $value) {

				$param[$i]['name'] = $value;
				switch ($value) {
					case 'textColor':
					$param[$i]['value'] = $this->orderKey(array_keys($this->textColor()));
					break;
					case 'backgroundColor':
					$param[$i]['value'] = $this->orderKey(array_keys($this->backgroundColor()));
					break;
					case 'mobileBackgroundColor':
					$param[$i]['value'] = $this->orderKey(array_keys($this->backgroundColor()));
					break;
					case 'layerBackgroundColor':
					$param[$i]['value'] = $this->orderKey(array_keys($this->backgroundColor()));
					break;
					case 'float':
					$param[$i]['value'] = array_keys($this->float());
					break;
					case 'textAling':
					$param[$i]['value'] = array_keys($this->textAling());
					break;
					case 'waves':
					$param[$i]['value'] = array_keys($this->waves());
					break;
					case 'shadow':
					$param[$i]['value'] = array_keys($this->shadow());
					break;
					default:
					switch ($type) {
						case 'alert':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeAlert());
							break;

						}
						break;

						case 'card':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeCard());
							break;
							case 'orientation':
							$param[$i]['value'] = array_keys($this->orientationCard());
							break;
							case 'size':
							$param[$i]['value'] = array_keys($this->sizeCard());
							break;

						}
						break;
						case 'preloader':
						case 'preloaderFull':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modePreloader());
							break;
							case 'size':
							$param[$i]['value'] = array_keys($this->sizePreloader());
							break;
						}
						break;
						case 'sideNav':
						switch ($value) {
							case 'edge':
							$param[$i]['value'] = array_keys($this->edge());
							break;

						}
						break;
						case 'icon':
						switch ($value) {
							case 'size':
							$param[$i]['value'] = array_keys($this->sizeIcon());
							break;

						}
						break;
						case 'table':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeTable());
							break;

						}
						break;
						case 'media':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeMedia());
							break;

						}
						break;
						case 'chip':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeChip());
							break;

						}
						break;
						case 'h':
						switch ($value) {
							case 'size':
							$param[$i]['value'] = array_keys($this->sizeTitle());
							break;

						}
						break;
						case 'inputButton':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeInputinputButton());
							break;

						}
						break;
						case 'inputRange':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeInputRange());
							break;

						}
						break;
						case 'InputSelect':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeInputSelect());
							break;

						}
						break;
						case 'InputRadioButtons':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeInputRadioButtons());
							break;

						}
						break;
						case 'InputCheckboxes':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeInputCheckboxes());
							break;

						}
						break;
						case 'InputFields':
						switch ($value) {
							case 'mode':
							$param[$i]['value'] = array_keys($this->modeInputFields());
							break;

						}
						break;
					}
					break;
				}
			}
			return $param;
		}

	}
	public function getActionClass($filePag){
		$temp_reg_exp = "(public)(\s+)(function)(\s+)([^__].+)((\\()(.*)(\\)))";

		if(preg_match_all("/{$temp_reg_exp}/", $filePag, $out)){
			foreach ($out[5] as $key => $value) {
				$result[$key]['name'] = $value;
				if(!empty($out[8][$key]))$result[$key]['param'] = $out[8][$key];
			}
			return $result;
		}

	}
	public function formSetParam($data){
		$out = array();
		$out['name'] = $data['nameVar'];
		$out['type'] = $data['type'];
		$out['param'] = array();
		$out['action'] = array();
		foreach ($data as $k => $v) {
			if($k !== 'editar_pagina' && $k !== 'nameObjAdd' && $k !== 'nameVar' && $k !== 'type' && !empty($v)){			
				if(strpos($k, '-') === FALSE){
					array_push($out['param'], array('name' => $k, 'value' => $v));
				}
				else{
					$compare = explode("-", $k);
					if($compare[1] == 'action'){
						$name = $v;
					}else{
						array_push($out['action'], array('name' => $name, 'value' => $v));
					}
				}
			}
		}
		if(empty($out['action'])) unset($out['action']);
		return $out;
	}
	public function jsonSetParam($json){
		$json2 = array();
		foreach ($json as $key => $value) {
			$tmpType = explode("-", $value['id'])[0];
			if($tmpType == 'a'){
				if(empty($value['datasetActivate'])){
					$json2[$key]['type'] = explode("-", $value['id'])[0];
					$text = empty($value['text']) ? NULL : $value['text'] ;
					$json2[$key]['param'] = $this->classToParam($value['className'], $json2[$key]['type'], $text);
				}
				else{
					$json2[$key]['type'] = explode("-", $value['datasetActivate'])[0];
					$text = empty($value['text']) ? NULL : $value['text'] ;
					$json2[$key]['param'] = $this->classToParam($value['className'], $json2[$key]['type'], $text);
				}
			}
			if($tmpType == 'media'){
				$json2[$key]['type'] = explode("-", $value['id'])[0];
				$text = empty($value['text']) ? NULL : $value['text'] ;
				$json2[$key]['param'] = $this->classToParam($value['className'], $json2[$key]['type'], $text);
				array_push($json2[$key]['param'], array('name' => 'src' ,'value' => $value['url']));
			}
			else{
				$json2[$key]['type'] = explode("-", $value['id'])[0];
				$text = empty($value['text']) ? NULL : $value['text'];
				$json2[$key]['param'] = $this->classToParam($value['className'], $json2[$key]['type'], $text);
			}
		}
		return $json2;
	}
	public function classToParam($arg, $type, $text = NULL){
		$textColor = implode("|", $this->textColor());
		$backgroundColor = implode("|", $this->backgroundColor());
		$textAling = implode("|", $this->textAling());
		$float = implode("|", $this->float());
		$waves = implode("|", $this->waves());
		$shadow = implode("|", $this->shadow());

		if(preg_match_all("/({$textColor})/", $arg, $out)){
			$param[0]['name'] = 'textColor';
			$param[0]['value'] = $this->textColor($out[0][0]);
			$arg = str_replace($out[0][0], "", $arg);
			
		}
		if(preg_match_all("/({$backgroundColor})/", $arg, $out)){
			$param[1]['name'] = 'backgroundColor';
			$param[1]['value'] = $this->backgroundColor($out[0][0]);
			$arg = str_replace($out[0][0], "", $arg);
			
		}
		if(preg_match_all("/({$textAling})/", $arg, $out)){
			$param[2]['name'] = 'textAling';
			$param[2]['value'] = $this->textAling($out[0][0]);
			$arg = str_replace($out[0][0], "", $arg);
		}
		if(preg_match_all("/({$float})/", $arg, $out)){
			$param[3]['name'] = 'float';
			$param[3]['value'] = $this->float($out[0][0]);
			$arg = str_replace($out[0][0], "", $arg);
		}
		if(preg_match_all("/({$waves})/", $arg, $out)){
			$param[4]['name'] = 'waves';
			$param[4]['value'] = $this->waves($out[0][0]);
			$arg = str_replace($out[0][0], "", $arg);
		}
		if(preg_match_all("/({$shadow})/", $arg, $out)){
			$param[5]['name'] = 'shadow';
			$param[5]['value'] = $this->shadow($out[0][0]);
			$arg = str_replace($out[0][0], "", $arg);
		}
		if(preg_match_all("/(icon)/", $type)){
			$param[5]['name'] = $type;
			$param[5]['value'] = $text;			
		}
		if( $type == "a" || $type == "p" || $type == "pre" || $type == "h" || $type == "blockquote" || $type == "chip" || $type == "inputButton" || $type == "span"){
			$param[5]['name'] = 'text';
			$param[5]['value'] = $text;			
		}
		return empty($param) ? array() : $param;
	}
	public function modObj($objMod, $listObjPag){
		foreach ($listObjPag as &$o) {
			if($o['name'] == $objMod['name'] && $o['type'] == $objMod['type']){
				$o = $objMod;
			}
		}
		return $listObjPag;
	}

	public function addObj($nameObjAdd, $listObjPag, $addObj){
		foreach ($listObjPag as $j => &$o) {
			if($o['name'] == $nameObjAdd){
				$o['action'][] = array('name' => 'addObj', 'value' => $addObj['name']);
			}
		}
		$listObjPag[] = $addObj;
		return $listObjPag;
	}

	public function delObj($name, $listObjPag){
		$key = NULL;
		foreach ($listObjPag as $k => $v) {
			if($v['name'] == $name){
				$key = $k;
			}
		}
		if(!is_null($key)){
			foreach ($listObjPag as $k => &$v) {
				if(!empty($v['action'])){
					foreach ($v['action'] as $k2 => $v2) {
						if(preg_match_all("/(add)/", $v2['name'])){
							if($v2['value'] == $name) unset($listObjPag[$k]['action'][$k2]);
						}

					}
					$keys = array_flip(array_keys($v['action']));
					$v['action'] = array_combine($keys, $v['action']);
				}
			}
			unset($listObjPag[$key]);
			$keys = array_flip(array_keys($listObjPag));
			$listObjPag = array_combine($keys, $listObjPag);
			/*elimino objeto : editJs*/
			foreach ($listObjPag as $k =>&$oP) {
				if($oP['type'] == "editJs"){
					unset($listObjPag[$k]);
				}
			}
			$keys = array_flip(array_keys($listObjPag));
			$listObjPag = array_combine($keys, $listObjPag);
			/*elimino objeto : editJs*/		
			return $listObjPag;
		}else{
			return FALSE;
		}
	}
	public function getObj($name, $listObjPag, $seach){
		foreach ($listObjPag as $value) {
			if($value[$seach] == $name){
				return $value;
			}
		}
	}
	public function getObjType($obj, $listObjDir){
	       foreach ($listObjDir as $v) {
	               if($v['type'] == $obj['type']){
	                       return $v;
	               }
	       }
	}
	public function getName($listObjDel, $listObjPag, $listObjDir){
		// xbug($listObjDel);
		// xbug($listObjPag);
		// xbug($listObjDir);
		$compare = $this->compareParamValue($listObjDel[0], $listObjPag);
		if(count($listObjDel) > 1){
			$maxKeyDel = max(array_keys($listObjDel));
			if($compare > 0){
				$name = $this->getNameByType($listObjDel[0], $listObjPag);
				foreach ($listObjDel as $i => $ObjDel) {
					if($i > 0 && $i < $maxKeyDel){
						$name = $this->getNameAndCompareParamValue($ObjDel, $listObjPag, $name);
					}
					if($i == $maxKeyDel){				
						$name = $this->getNameAndCompareParamValue($ObjDel, $listObjPag, $name, true);
					}
				}
			}		
		}else{
			$name = $this->getNameByType2($listObjDel[0], $listObjPag);
		}
		return $name;
	}
	public function getNameByType2($objDel, $listObjPag){
		$name = array();
		foreach ($listObjPag as $i => $objPag) {
			if($objPag['type'] == $objDel['type']){
				$name = $objPag['name']; 
			}
		}
		return $name;
	}
	public function getNameAndCompareParamValue($objDel, $listObjPag, $name, $end = NULL){
		$listCompare = array();
		foreach ($listObjPag as $i => $objPag) {
			$info = array('name' => NULL, 'compare' => 0);
			if($objPag['type'] == $objDel['type'] && in_array($objPag['name'], $name)){
				$info['compare']++;
				$info['name'] = $objPag['name'];
				if(is_array($objPag['param'])){					
					foreach ($objPag['param'] as $j => $paramPag) {
						foreach ($objDel['param'] as $k => $paramDel) {
							if($paramPag['name'] == $paramDel['name'] && $paramPag['value'] == $paramDel['value']){
								$info['compare']++;
							}
						}
					}
				}
				$listCompare[] = $info;
			}
		}
		$name = $this->getNameMaxCompare($listCompare);
		if(is_null($end)){
			$listName = $this->getNameByChild($name, $listObjPag);
			return $listName;
		}else{
			return $name;
		}
	}
	public function getNameByChild($name, $listObjPag){
		$out = array();
		foreach ($listObjPag as $objPag) {
			if($objPag['name'] == $name){
				foreach ($objPag['action'] as $j => $actionPag) {
					if(preg_match_all("/(add)/", $actionPag['name'])) $out[] = $actionPag['value'];
				}
			}
		}
		return $out;
	}
	public function getNameMaxCompare($listCompare){
		$compare = array();
		foreach ($listCompare as $info) {
			$compare[] = $info['compare'];
		}
		$maxValue = max($compare);
		foreach ($listCompare as $k => $info) {
			if($info['compare'] == $maxValue){
				$name = $listCompare[$k]['name'];
			}
		}
		return $name;	
	}
	public function compareParamValue($objDel, $listObjPag){		
		$compare = 0;
		foreach ($listObjPag as $i => $objPag) {
			if($objPag['type'] == $objDel['type']){
				foreach ($objPag['param'] as $j => $paramPag) {
					foreach ($objDel['param'] as $k => $paramDel) {
						if($paramPag['name'] == $paramDel['name'] && $paramPag['value'] == $paramDel['value']) $compare++;
					}
				}
			}
		}
		return $compare;
	}

	public function getNameByType($objDel, $listObjPag){
		$name = array();
		foreach ($listObjPag as $i => $objPag) {
			if($objPag['type'] == $objDel['type']){
				foreach ($objPag['action'] as $j => $actionPag) {
					if(preg_match_all("/(add)/", $actionPag['name'])) $name[] = $actionPag['value'];
				}
			}
		}
		return $name;
	}
	public function createAction($data, &$temp, $search, $f = 0, $j = 0){
		// if($f > 0){
		// 	xbug("interacion : {$f}");
		// 	xbug($temp);
		// 	xbug("/////////////////////////////////////////////");
		// }
		$f++;
		if(is_array($search)){
			foreach ($data as $i => &$d) {
				if($d[0] == $search[0]){
					$temp[] = $d;
					$search = $d[2];
					unset($data[$i]);
					return $this->createAction($data, $temp, $search, $f);
				}
			}
		}
		else{
			if(!empty($data)){				
				foreach ($data as $i => &$d) {
					if($d[0] == $search){
						if($d[0] == 'pag'){
							$temp[] = $d;
						}else{
							array_unshift($temp, $d);
						}
						$search = $d[2];
						unset($data[$i]);
						return $this->createAction($data, $temp, $search, $f);
					}
					else{
						$find = FALSE;					
					}
				}
			}
			else{
				//salir
				return;
			}
			if(!$find){
				if(!empty($temp[$j][0])){
					foreach ($data as $i => &$d) {
						if($d[0] == $temp[$j][0]){
							if($d[0] == 'pag'){
								$temp[] = $d;
							}else{
								array_unshift($temp, $d);
							}
							$search = $d[2];
							unset($data[$i]);
							return $this->createAction($data, $temp, $search, $f);
						}
						else{
							$find = FALSE;
						}
					}
					if(!$find){
						$j++;
						return $this->createAction($data, $temp, $search, $f, $j);
					}
				}
				else{					
					foreach ($data as $i => &$d) {
						if($d[0] == 'pag'){
							$temp[] = $d;
						}else{
							array_unshift($temp, $d);
						}
						$search = $d[2];
						unset($data[$i]);
						return $this->createAction($data, $temp, $search, $f);
					}				
				}
			}
		}
	}
	public function createPhp($listObjPag){
		$code = array();
		$code[] = "<?php \n";
		$code[] = "\n/* obj */\n\n";
		foreach ($listObjPag as $v) {
			if(!empty($v['param'])){
				foreach ($v['param'] as $vParam) {
					if(preg_match_all("/(array)/", $vParam['value']) ){
						$tempValue = str_replace('array(', '', $vParam['value']);
						$tempValue = str_replace(')', '', $tempValue);
						$arrayTempValue = explode(",", $tempValue);
						$tempValue = $return = array();
						foreach ($arrayTempValue as $key => $value) {
							if($key % 2 == 0){
								$tempValue[] = "'".trim($value);
							}else{
								$tempValue[] = trim($value)."'";
								$return[] = implode(",", $tempValue);
								$tempValue = array();
							}					
						}
						$return = implode(",", $return);
						$return = "array({$return});";
						$code[] = "\${$v['name']}['{$vParam['name']}'] = {$return} \n";
					}else{
						$code[] = "\${$v['name']}['{$vParam['name']}'] = '{$vParam['value']}'; \n";
					}
				}
				$code[] = "\${$v['name']} = new AppBundle\\Utility\\Obj\\{$v['type']}(\${$v['name']}); \n";
			}else{
				$code[] = "\${$v['name']} = new AppBundle\\Utility\\Obj\\{$v['type']}(); \n";
			}
		}
		// xbug(htmlentities($filePag)); //aca se debe realizar una explresion regular para sacar los metodos y agregarlos a la variable code, con eso deberia sacarse die para que el servicio retorne su valor, con el fin de que se ejecute el grabado 
		$code[] = "\n/* actions */\n";

		foreach ($listObjPag as $v) {
			if(!empty($v['action'])){
				if($v['type'] == 'pag'){
					$r = $v['action'];	
				}
				else{
					$r = array_reverse($v['action']);					
				}
				foreach ($r as $vParam) {
					$data[] =  array($v['name'], $vParam['name'], $vParam['value']); 
				}
			}
		}
		$temp = array();

		$this->createAction($data, $temp, $data[0]);
		foreach ($temp as $d) {
			$code[] = "\${$d[0]}->{$d[1]}(\${$d[2]}); \n";
		}
			

		$code[] = "\n\n/* edit */\n";
		$code[] = 

		/*codigo edicion*/
		"\nif(!empty(\$editar)){\n".
		"\tif(!empty(\$action) && \$action !== 'default'){\n".
		"\t\t\$editJs = new AppBundle\\Utility\\Obj\\editJs(\$editar);\n".
		"\t\t\$pag->js = \$editJs->getJs('default');\n".
		"\t\t\tswitch (\$action) {\n".
		"\t\t\t\tcase 'add':\n".
		"\t\t\t\t\t\$pag->js = \$editJs->getJs('add'); \n".
		"\t\t\t\tbreak;\n".
		"\t\t\t\tcase 'edit':\n".
		"\t\t\t\t\t\$pag->js = \$editJs->getJs('edit');\n".
		"\t\t\t\tbreak;\n".
		"\t\t\t\tcase 'del':\n".
		"\t\t\t\t\t\$pag->js = \$editJs->getJs('del');\n".
		"\t\t\t\tbreak;\n".
		"\t\t}\n".
		"\t}\n".
		"}\n";
		/*codigo edicion*/


		foreach ($listObjPag as $v) {
			if($v['type'] == 'pag'){
				$code[] = "\n/* final action */\n\n";
				$code[] = "\${$v['name']}->render();\n";
			}
		}
		$code = implode("", $code);
		return $code;
	}
	public function scanHiddenObj($listObjPag){
		$list = array();
		foreach ($listObjPag as $o) {
			if(preg_match("/(alert|br|breadcrumbs|card|carousel|col|collapsible|collection|container|div|divider|dropdown|footer|form|header|js|main|modal|pag|preloader|preloaderFull|row|section|slider|style|table|tab)/", $o['type'])){
				$list[] = $o;
			}
		}
		return $list;
	}
}