<?
// $pag['backgroundColor'] = 'red,5';
// $pag = new AppBundle\Utility\Obj\pag($pag);

$container['backgroundColor'] = 'red,5';
$container['text'] = 'fafa';
$container = new AppBundle\Utility\Obj\container($container);

$type['size'] = '2';
$type['text'] = "Type : {$objFull['type']}";
$type = new AppBundle\Utility\Obj\h($type);

$name['size'] = '2';
$name['text'] = "Name : {$obj['name']}";
$name = new AppBundle\Utility\Obj\h($name);

$form['method'] = "POST";
$form = new AppBundle\Utility\Obj\form($form);

$inputS = $inputT = $inputC = $inputF = array();

foreach ($objFull['param'] as $v) {
	if(!empty($v['value']) && is_array($v['value'])){
		$optionSelect = array();
		$optionSelect['name'] = $v['name'];
		$optionSelect['text'] = $v['name'];
		$temp = array();
		foreach ($v['value'] as $o) {
			$insert = FALSE;
			foreach ($obj['param'] as $op) {
				if($op['name'] == $v['name'] && $op['value'] == $o){
					if(preg_match_all("/(color)/" ,strtolower($v['name']))){
						$temp[] = array('active' => TRUE, 'text' => $o, 'value' => $o, 'backgroundColors' => $o);
					}else{

						$temp[] = array('active' => TRUE, 'text' => $o, 'value' => $o);
					}
				}else{
					$insert = TRUE;
				}
			}
			if($insert) {
				if(preg_match_all("/(color)/" ,strtolower($v['name']))){
					$temp[] = array('text' => $o, 'value' => $o, 'backgroundColors' => $o);
				}else{

					$temp[] = array('text' => $o, 'value' => $o);
				}
			}
		}
		$optionSelect['option'] = $temp;
		$inputS[] = new AppBundle\Utility\Obj\inputSelect($optionSelect);
	}
	elseif (preg_match_all("/(text|js|src|alt|icon|class|href|dataActive|dataTarget)/", $v['name']) ) {
		if($v['name'] == 'js'){
			$optionFields = array();
			$optionFields['name'] = $v['name'];
			$optionFields['text'] = $v['name'];
			foreach ($obj['param'] as $op) {
				if($op['name'] == $v['name']){
					$optionFields['value'] = $op['value'];
				}
			}
			$inputT[] = new AppBundle\Utility\Obj\inputTextarea($optionFields);
		}
		else{	
			$optionFields = array();
			$optionFields['name'] = $v['name'];
			$optionFields['text'] = $v['name'];
			foreach ($obj['param'] as $op) {
				if($op['name'] == $v['name']){
					$optionFields['value'] = $op['value'];
				}
			}
			$inputF[] = new AppBundle\Utility\Obj\inputFields($optionFields);
		}
	
	}
	else {
		$optionCheckboxes = array();
		$optionCheckboxes['name'] = $v['name'];
		$temp = array();
		$insert = FALSE;
		foreach ($obj['param'] as $op) {
			if($op['name'] == $v['name']){
				$temp[] = array('active' => TRUE ,'text' => $v['name'], 'value' => '1');
			}
			else{
				$insert = TRUE;
			}
		}
		if($insert){ $temp[] = array('text' => $v['name'], 'value' => '1'); }
		$optionCheckboxes['option'] = $temp;
		$inputC[] = new AppBundle\Utility\Obj\inputCheckboxes($optionCheckboxes);	
	}	
}

/* action */

$container->addObj($type);
$container->addObj($name);
if(!empty($inputS)){
	foreach ($inputS as $is) {
		$form->addObj($is);
	}
}
if(!empty($inputF)){
	foreach ($inputF as $if) {
		$form->addObj($if);
	}
}
if(!empty($inputT)){
	foreach ($inputT as $it) {
		$form->addObj($it);
	}
}
if(!empty($inputC)){
	foreach ($inputC as $ic) {
		$form->addObj($ic);
	}
}
$container->addObj($form);

$out = $container->html;
$out .= "<script>";
if(is_array($container->js)){
	foreach ($container->js as $js) {
		$out .= $js;
	}
}
$out .= "</script>";
// $pag->addObj($container);

// /* edit */

// if(!empty($editar)){
// 	if(!empty($action) && $action !== 'default'){
// 		$editJs = new AppBundle\Utility\Obj\editJs($editar);
// 		$pag->js = $editJs->getJs('default');
// 		switch ($action) {
// 			case 'add':
// 			$pag->js = $editJs->getJs('add'); 
// 			break;
// 			case 'edit':
// 			$pag->js = $editJs->getJs('edit');				
// 			break;
// 			case 'del':
// 			$pag->js = $editJs->getJs('del');				
// 			break;
// 		}
// 	}
// }

// /* action final */

// $pag->render();