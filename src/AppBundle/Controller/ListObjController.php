<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class ListObjController extends Controller
{
    public function indexAction(Request $request)
    {

        if(strpos($request->server->get('DOCUMENT_ROOT'), "/") === FALSE ){ 
            #path plantillas html Windows
            $relativePath = "\\src\\AppBundle\\Resources\\views\\default";
            $path = str_replace("\\web", $relativePath, $request->server->get('DOCUMENT_ROOT'));

        }
        else{
            #path plantillas html Linux
            $relativePath = "/src/AppBundle/Resources/views/default";
            $path = str_replace("/web", $relativePath, $request->server->get('DOCUMENT_ROOT'));

        }

    	$post['editar_pagina'] = $request->attributes->get('pag');

    	$dirbase = new dirbase($path);
    	$filePag = $dirbase->getObj($post['editar_pagina'])->viewFile();

        if(preg_match("|(.+[^\040])(new\040AppBundle.Utility.Obj.pag)|", $filePag, $hex))xbug($hex);


        return $this->render('AppBundle:default:listObj.html.php', array());
    }

}
