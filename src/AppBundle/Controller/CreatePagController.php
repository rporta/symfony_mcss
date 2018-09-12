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
	    	$dirbase->createFile($newpag);

			return $this->render('AppBundle:default:createPag.html.php', array('post' => $post));
    	}
    	else {
			return $this->render('AppBundle:default:createPag.html.php');
    	}
    }	
}
