<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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

        $url = $this->generateUrl('app_facebook_connect_callback', [], UrlGeneratorInterface::ABSOLUTE_URL);

        $loginUrl = $helper->getLoginUrl($url, $permission);

        return $this->render('AppBundle:Facebook:index.html.twig', [
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