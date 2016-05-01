<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FacebookController extends Controller
{
    private $fb;

    public function __construct()
    {
        $this->fb = $this->get('facebook');
    }
    public function loginAction()
    {

    }

    public function loginCallbackAction()
    {

    }
}