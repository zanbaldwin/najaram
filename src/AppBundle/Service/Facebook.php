<?php

namespace AppBundle\Service;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook as FacebookClient;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Facebook extends FacebookClient
{
    private $session;
    private $currentUser;
    public function __construct(SessionInterface $session, array $facebookSettings)
    {
        $this->session = $session;
        parent::__construct($facebookSettings);
    }
    public function isLoggedIn()
    {
        return $this->getCurrentUser() !== null;
    }

    public function getCurrentUser()
    {
        if ($this->currentUser !== null) {
            return $this->currentUser;
        }
        try {
            $response = $this->get('/me');
            $this->currentUser = $response->getGraphUser();
        } catch (FacebookSDKException $e) {
        }
        return $this->currentUser;
    }
}