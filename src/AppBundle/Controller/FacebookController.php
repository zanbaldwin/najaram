<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class FacebookController extends Controller
{
    private $fb;

    /**
     * @return Response
     */
    public function loginAction()
    {
        $helper = $this->getFb()->getRedirectLoginHelper();

        $permission = ['email', 'user_likes'];

        $url = $this->generateUrl('app_facebook_connect_callback', [], UrlGeneratorInterface::ABSOLUTE_URL);

        $loginUrl = $helper->getLoginUrl($url, $permission);

        return $this->render('AppBundle:Facebook:index.html.twig', [
            'loginurl' => $loginUrl
        ]);
    }

    /**
     * @return Response
     */
    public function loginCallbackAction()
    {

        $helper = $this->getFb()->getRedirectLoginHelper();

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
            $session = $this->get('session');
            $session->set('facebook_access_token', (string)$accessToken);
            $session->save();

            return new Response($session);
        }

    }

    /**
     * @return \AppBundle\Service\Facebook
     */
    private function getFb()
    {
        return $this->fb = $this->get('facebook');
    }
}