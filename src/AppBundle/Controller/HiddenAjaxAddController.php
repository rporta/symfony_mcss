<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class HiddenAjaxAddController extends Controller
{
    public function indexAction(Request $request)
    {
    	return $this->render('AppBundle:default:newObj.html.php' ,array('tempElement' => $tempElement));
    }	
}
