<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class FrameLoadController extends Controller
{
    public function indexAction(Request $request)
    {
    	$post['editar_pagina'] = $request->attributes->get('pag');
    	$post['editar_accion'] = $request->attributes->get('action');
		if($post['editar_pagina'] == 'deletePag.html.php'){
			if(strpos($request->server->get('DOCUMENT_ROOT'), "/") === FALSE ){
            #path plantillas html
				$relativePath = "\\src\\AppBundle\\Resources\\views\\default";
				$path = str_replace("\\web", $relativePath, $request->server->get('DOCUMENT_ROOT'));

			}
			else{
            #path plantillas html
				$relativePath = "/src/AppBundle/Resources/views/default";
				$path = str_replace("/web", $relativePath, $request->server->get('DOCUMENT_ROOT'));

			}

			$dirbase = new dirbase($path);


			$arrayFileTempHtml = $dirbase->getProperty('arrayFile');

			foreach ($arrayFileTempHtml as $key => $value) {
				$selectFile[] = array('text' => $value, 'value' => $value);
			}
			return $this->render('AppBundle:default:'.$post['editar_pagina'], array('editar' => $post['editar_pagina'], 'action' => $post['editar_accion'], 'selectFile' => $selectFile));
		}else{

			if($post['editar_accion'] == 'add' || $post['editar_accion'] == 'edit' || $post['editar_accion'] == 'del' || $post['editar_accion'] == 'default'){
        		return $this->render('AppBundle:default:'.$post['editar_pagina'], array('editar' => $post['editar_pagina'], 'action' => $post['editar_accion']));			
			}else{
				switch ($post['editar_accion']) {
					case 'hiddenadd':
							xbug('hiddenadd');die();
							$tempElement['mode'] = "newobj";
							$tempElement['action'] = "/ajaxprocessadd";
							$tempElement['objFull'] = $obj;
							$tempElement['objPag'] = $objPag;
							$tempElement['nameObjAdd'] = $data['nameObjAdd'];
							$tempElement['editar_pagina'] = $post['editar_pagina'];
							return $this->render('AppBundle:default:newObj.html.php' ,array('tempElement' => $tempElement));						
						break;
					case 'hiddenedit':
							xbug('hiddenedit');die();
							$tempElement['mode'] = "newobj";
							$tempElement['action'] = "/ajaxprocessadd";
							$tempElement['objFull'] = $obj;
							$tempElement['objPag'] = $objPag;
							$tempElement['nameObjAdd'] = $data['nameObjAdd'];
							$tempElement['editar_pagina'] = $post['editar_pagina'];
							return $this->render('AppBundle:default:newObj.html.php' ,array('tempElement' => $tempElement));							
						break;
					case 'hiddendel':
							xbug('hiddendel');die();
							$tempElement['mode'] = "newobj";
							$tempElement['action'] = "/ajaxprocessadd";
							$tempElement['objFull'] = $obj;
							$tempElement['objPag'] = $objPag;
							$tempElement['nameObjAdd'] = $data['nameObjAdd'];
							$tempElement['editar_pagina'] = $post['editar_pagina'];
							return $this->render('AppBundle:default:newObj.html.php' ,array('tempElement' => $tempElement));							
						break;
				}
			}
		}


    }	
}
