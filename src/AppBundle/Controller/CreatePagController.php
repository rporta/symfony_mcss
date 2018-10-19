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

			$tempHtml = 
"<?

/* obj */

\$pag['backgroundColor'] = 'grey,0';
\$pag = new AppBundle\Utility\Obj\pag(\$pag);
\$h['textAling'] = 'c';
\$h['textColor'] = 'red,3';
\$h['text'] = 'Nueva Pagina ({$post['nueva_pagina']})';
\$h = new AppBundle\\Utility\\Obj\\h(\$h);

/* actions */

\$pag->addObj(\$h);

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
