<?php

namespace AppBundle\Service;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook as FacebookClient;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Facebook extends FacebookClient
{
    const ACCESS_TOKEN_SESSION_ID = 'facebook_acces_token';

    private $session;
    private $currentUser;

    public function __construct(SessionInterface $session, array $facebookSettings)
    {
        $this->session = $session;
        parent::__construct($facebookSettings);
    }

    /**
     * Checks if the current user is logged in.
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        return $this->getCurrentUser() !== null;
    }

    /**
     * Get the current user.
     *
     * @return \Facebook\GraphNodes\GraphUser|null
     */
    public function getCurrentUser()
    {
        if (!$this->session->has(static::ACCESS_TOKEN_SESSION_ID)) {
            return null;
        }

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