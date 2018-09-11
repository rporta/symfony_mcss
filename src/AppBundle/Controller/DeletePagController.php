<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class DeletePagController extends Controller
{
    public function indexAction(Request $request)
    {
    	$post = $request->request->all();
    	
    	#path plantillas html
		$relativePath = "/src/AppBundle/Resources/views/default";
    	$path = str_replace("/web", $relativePath, $request->server->get('DOCUMENT_ROOT'));

    	$dirbase = new dirbase($path);


    	$arrayFileTempHtml = $dirbase->getProperty('arrayFile');

    	foreach ($arrayFileTempHtml as $key => $value) {
    		$selectFile[] = array('text' => $value, 'value' => $value);
    	}

    	if(!empty($post)){
    		unset($selectFile);
    		$deletePag = $post['borrar_pagina'];
    		$dirbase->deleteFile($deletePag);
			$arrayFileTempHtml = $dirbase->getProperty('arrayFile');

			foreach ($arrayFileTempHtml as $key => $value) {
				$selectFile[] = array('text' => $value, 'value' => $value);
			}    		
    		return $this->render('AppBundle:default:deletePag.html.php', array('selectFile' => $selectFile, 'post' => $post));
    	}else{
    		return $this->render('AppBundle:default:deletePag.html.php', array('selectFile' => $selectFile));
    	}
    }		
}
