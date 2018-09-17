<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class EditPagController extends Controller
{
    public function indexAction(Request $request)
    {
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

    	if(!empty($post)){
            #aca va la plantilla que carga la pagina 
    		#return $this->render('AppBundle:default:editPag.html.php', array('post' => $post));
            return $this->render('AppBundle:default:loadPag.html.php', array('post' => $post));
        }else{
    		return $this->render('AppBundle:default:editPag.html.php', array('selectFile' => $selectFile));
    	}
    }	
}
