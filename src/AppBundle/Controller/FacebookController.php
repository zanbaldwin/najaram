<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class FacebookController extends Controller
{
    private $fb;

    public function __construct()
    {
        $this->fb = $this->get('facebook');
    }
    public function loginAction()
    {
        $helper = $this->fb->getRedirectLoginHelper();
        $permission = ['email', 'user_likes'];

        $loginUrl = $helper->getLoginUrl(UrlGeneratorInterface::ABSOLUTE_URL);
        // will continue this
        return $this->render('Path to the view', [
            'loginurl' => $loginUrl
        ]);
    }

    public function loginCallbackAction()
    {
        $helper = $this->fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            $session = $this->container->get('session');
            $session->set('facebook_access_token', string($accessToken));
            $session->save();

            return $session;
        }

    }
}