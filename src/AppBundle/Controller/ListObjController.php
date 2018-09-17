<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;
// use AppBundle\Service\Obj\ListObj;

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
        // $message = $ListObj->getHappyMessage();
        // xbug($message);
    	$post['editar_pagina'] = $request->attributes->get('pag');

    	$dirbase = new dirbase($path);
    	$filePag = $dirbase->getObj($post['editar_pagina'])->viewFile();

        $reg_exp = "(\\$)(.+)(\s+\\=\s+)(new\s+AppBundle\\\Utility\\\Obj\\\pag\\()((\\$)(.+)){0,1}(\\);)";

        if(preg_match_all("|{$reg_exp}|", $filePag, $result)){
            //nombre de objeto variable
            $obj_pag = $result[2][0];
            //nombre de array param
            $param_pag = !empty($result[7][0]);

        }


        return $this->render('AppBundle:default:listObj.html.php', array());
    }

}
