<?php

namespace Mdespeuilles\SogeCommerceBundle\Controller;

use Mdespeuilles\SogeCommerceBundle\Event\ReturnEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function returnAction(Request $request)
    {
        $datas = $request->query->all();
        
        $this->get('event_dispatcher')->dispatch(ReturnEvent::NAME, new ReturnEvent($datas));
        $route = $this->getParameter('mdespeuilles_soge_commerce.return_route');
        
        return $this->redirectToRoute($route);
    }
}