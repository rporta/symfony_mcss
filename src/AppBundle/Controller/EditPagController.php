<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class EditPagController extends Controller
{
    public function indexAction(Request $request)
    {
    	return $this->render('AppBundle:default:editPag.html.php');
    }	
}
