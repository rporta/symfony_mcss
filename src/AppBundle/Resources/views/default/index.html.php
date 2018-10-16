<?php

/* obj */

// // $pag['mode'] = "grey,0";
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);
$br['repeat'] = 1;
$br = new AppBundle\Utility\Obj\br($br);
$preloaderFull['layerBackgroundColor'] = 'b-w-t,0';
$preloaderFull['backgroundColor'] = array('purple,5', 'blue,3');
$preloaderFull['mode'] = "0";
$preloaderFull = new AppBundle\Utility\Obj\preloaderFull($preloaderFull);
$header['backgroundColor'] = "blue,8";
$header = new AppBundle\Utility\Obj\header($header);
$carrousel = new AppBundle\Utility\Obj\carousel();
$div['backgroundColor'] = 'blue,3';
$div = new AppBundle\Utility\Obj\div($div);
$div2 = clone $div;
$div3 = clone $div;
$div4 = clone $div;
$conteiner = new AppBundle\Utility\Obj\container();		
$p['text'] = "Hola soy P1";
$p = new AppBundle\Utility\Obj\p($p);
$div2->backgroundColor = "blue,5";
$div3->backgroundColor = "blue,8";
$div4->backgroundColor = "blue,10";
$nav['backgroundColor'] = 'blue,8';
$nav['float'] = 'r';
$nav['mobile'] = TRUE;
$nav['mobileBackgroundColor'] = "red,6";
$nav['shadow'] = 1;
$nav = new AppBundle\Utility\Obj\nav($nav);
$a_1['text'] = 'Logo';
$a_1 = new AppBundle\Utility\Obj\a($a_1);
$icon_1['icon'] = "ac_unit";
$icon_1['textColor'] = 'grey,1';
$icon_1['float'] = "l";
$icon_1['size'] = "1";
$icon_1 = new AppBundle\Utility\Obj\icon($icon_1);
$a_2['textColor'] = 'grey,1';
$a_2['text'] = 'btn 1';
$a_2 = new AppBundle\Utility\Obj\a($a_2);
$badge['text'] = "mensajes 1";
$badge['backgroundColor'] = 'green,8';
$badge['textColor'] = 'grey,8';
$badge['new'] = TRUE;
$badge = new AppBundle\Utility\Obj\badge($badge);	
$icon_x['icon'] = "ac_unit";
$icon_x['textColor'] = 'grey,1';
$icon_x['size'] = "1";
$icon_x['float'] = "l";
$icon_x = new AppBundle\Utility\Obj\icon($icon_x);
$a_3['textColor'] = 'grey,1';
$a_3['text'] = 'btn 3';
$a_3 = new AppBundle\Utility\Obj\a($a_3);
$dropdown['button'] = TRUE;
$dropdown = new AppBundle\Utility\Obj\dropdown();
$a_4['textColor'] = 'grey,1';
$a_4['text'] = 'dropdown';
$a_4 = new AppBundle\Utility\Obj\a($a_4);
$icon_2['icon'] = "arrow_drop_down";
$icon_2['textColor'] = 'grey,1';
$icon_2['float'] = "r";
$icon_2 = new AppBundle\Utility\Obj\icon($icon_2);
$a_5['textColor'] = 'grey,9';
$a_5['text'] = 'btn 1';
$a_5 = new AppBundle\Utility\Obj\a($a_5);
$icon_3['icon'] = "ac_unit";
$icon_3['textColor'] = 'grey,9';
$icon_3['float'] = "r";
$icon_3 = new AppBundle\Utility\Obj\icon($icon_3);
$a_6['textColor'] = 'grey,9';
$a_6['text'] = 'btn 2';
$a_6 = new AppBundle\Utility\Obj\a($a_6);
// $main['container'] = TRUE;
$main['shadow'] = "1";
$main = new AppBundle\Utility\Obj\main($main);
$card['mode'] = "1";
// $card['backgroundColor'] = "red,6";
// $card['orientation'] = "h";
$card['size'] = "1";
$card = new AppBundle\Utility\Obj\card($card);
$titulo['textColor'] = 'red,3';
$titulo['text'] = 'soy titulo';
$titulo['size'] = '4';
$titulo = new AppBundle\Utility\Obj\h($titulo);
$media['responsive'] = true;
$media['src'] = "http://archives.materializecss.com/0.100.2/images/sample-1.jpg";
$media = new AppBundle\Utility\Obj\media($media);
$footer['shadow'] = 5;
$footer['backgroundColor'] = "red,6";
$footer['stickyfooter'] = true;
$footer = new AppBundle\Utility\Obj\footer($footer);

/* actions */

$conteiner->addObj($p);
$conteiner->addObj($br);
$conteiner->addObj($p);
$conteiner->addObj($br);
$conteiner->addObj($p);
// $conteiner->addObj($br);
$div->addObj($conteiner);
$div2->addObj($conteiner);
$div3->addObj($conteiner);
$div4->addObj($conteiner);
$carrousel->addObj($div);
$carrousel->addObj($div2);
$carrousel->addObj($div3);
$carrousel->addObj($div4);
$a_1->addObj($icon_1);
$a_2->addObj($icon_x);
$a_3->addObj($icon_1);
$nav->addObj($a_1);
$nav->addObj($a_2);
$nav->addObj($a_3);
$a_4->addObj($icon_2);
$a_5->addObj($icon_3);
$a_6->addObj($icon_3);
$dropdown->addObj($a_4);
$dropdown->addObj($a_5);
$dropdown->addObj($a_6);
$nav->addObj($dropdown);
$nav->addObj($dropdown);
$header->addObj($nav);
$card->addObjImg($media);
$card->addObjImg($titulo);
$card->addObjContent($titulo);
$card->addObjContent($p);
$card->addObjReveal($p);
$main->addObj($card);
$footer->addObj($br);
$footer->addObj($br);
$pag->addObj($preloaderFull);
$pag->addObj($header);
$pag->addObj($main);
$pag->addObj($footer);

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

/* final action */

$pag->render();