<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class CreatePagController extends Controller
{
    public function indexAction(Request $request)
    {	
    	$post = $request->request->all();
    	if(!empty($post)){
	    	$extends = ".html.php";
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

	    	$newpag = $post['nueva_pagina'].$extends;
// quiza esto deba estar en un servicio, y el codigo deba estar implementado en un objeto tipo temp o no, quiza un servicio
			$tempHtml = 
"<?

/* obj */

\$pag['backgroundColor'] = 'grey,0';
\$pag = new AppBundle\Utility\Obj\pag(\$pag);

\$preloaderFull['layerBackgroundColor'] = 'b-w-t,0'; 
\$preloaderFull['backgroundColor'] = array('purple,5','blue,3'); 
\$preloaderFull['mode'] = '0'; 
\$preloaderFull = new AppBundle\\Utility\\Obj\\preloaderFull(\$preloaderFull);

/* actions */

\$pag->addObj(\$preloaderFull);

/* edit */

if(!empty(\$editar)){
	if(!empty(\$action) && \$action !== 'default'){
		\$editJs = new AppBundle\\Utility\\Obj\\editJs(\$editar);
		\$pag->js = \$editJs->getJs('default');
		switch (\$action) {
			case 'add':
			\$pag->js = \$editJs->getJs('add'); 
			break;
			case 'edit':
			\$pag->js = \$editJs->getJs('edit');				
			break;
			case 'del':
			\$pag->js = \$editJs->getJs('del');				
			break;
			case 'hiddenadd':
			\$pag->js = \$editJs->getJs('hiddenadd'); 
			break;
			case 'hiddenedit':
			\$pag->js = \$editJs->getJs('hiddenedit');				
			break;
			case 'hiddendel':
			\$pag->js = \$editJs->getJs('hiddendel');				
			break;			
		}
	}
}

/* final action */

\$pag->render();";
	    	$dirbase->createFile($newpag, $tempHtml);

			return $this->render('AppBundle:default:createPag.html.php', array('post' => $post));
    	}
    	else {
			return $this->render('AppBundle:default:createPag.html.php');
    	}
    }	
}
