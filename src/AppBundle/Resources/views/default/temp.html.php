<?

/* obj */

// xbug($obj);
// xbug($objFull);

$pag['backgroundColor'] = 'red,5';
$pag = new AppBundle\Utility\Obj\pag($pag);

$container['backgroundColor'] = 'red,5';
$container['text'] = 'fafa';
$container = new AppBundle\Utility\Obj\container($container);

$type['size'] = '2';
$type['text'] = "type : {$objFull['type']}";
$type = new AppBundle\Utility\Obj\h($type);

$divider['backgroundColor'] = "red,5";
$divider = new AppBundle\Utility\Obj\divider($divider);

$name['size'] = '2';
$name['text'] = "name : {$obj['name']}";
$name = new AppBundle\Utility\Obj\h($name);

$form['method'] = "POST";
$form = new AppBundle\Utility\Obj\form($form);

$inputSelect = array();
foreach ($objFull['param'] as $v) {
	xbug($v);
	if(!empty($v['value'])){
		if(is_array($v['value'])){
			$optionSelect = array();
			$optionSelect['text'] = $v['name'];
			foreach ($v['value'] as $o) {
				$temp[] = array('text' => $o, 'value' => $o);
			}
		}		
	}

	$optionSelect['option'] = $temp;
	$inputSelect[] = new AppBundle\Utility\Obj\inputSelect($optionSelect);
}

/* action */

$container->addObj($type);
$container->addObj($divider);
$container->addObj($name);
foreach ($inputSelect as $is) {
	$form->addObj($is);
}
$container->addObj($form);
$pag->addObj($container);

/* edit */

if(!empty($editar)){
	if(!empty($action) && $action !== 'default'){
		$editJs = new AppBundle\Utility\Obj\editJs($editar);
		$pag->js = $editJs->getJs('default');
		switch ($action) {
			case 'add':
			$pag->js = $editJs->getJs('add'); 
			break;
			case 'edit':
			$pag->js = $editJs->getJs('edit');				
			break;
			case 'del':
			$pag->js = $editJs->getJs('del');				
			break;
		}
	}
}

/* action final */

$pag->render();