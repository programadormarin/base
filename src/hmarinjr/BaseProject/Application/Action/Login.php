<?php
namespace hmarinjr\BaseProject\Application\Action;

use \hmarinjr\BaseProject\Application\Service\TwitterConnectionException;
use \Lcobucci\ActionMapper2\Routing\Annotation\Route;
use \Lcobucci\ActionMapper2\Routing\Controller;

class Login extends Controller
{
    /**
     * @Route("/cocodebarata", methods={"GET"})
     */
    public function redirectToTwitter()
    {
    	echo 'Coco de Barata';
    	die();
        try {
            $provider = $this->getTwitterProvider();
            $url = $provider->redirectToLogin();
            $this->redirect($url);
        } catch (TwitterConnectionException $error) {
            $this->redirect('/');
        }
    }

    /**
     * @Route("/callback")
     */
    public function receiveTwitterData()
    {
        $provider = $this->getTwitterProvider();

        try {
            $provider->callback(
                $this->request->get('oauth_token'),
                $this->request->get('oauth_verifier')
            );

            if (!$this->getAuthenticationService()->getLoggedUser()) {
                $this->redirect('/user/new');
            }

            $path = $this->request->getSession()->get('redirectTo', '/');

            if ($path != '/') {
                $this->request->getSession()->remove('redirectTo');
            }
        } catch (TwitterConnectionException $error) {
            $path = '/';
        }

        $this->redirect($path);
    }

    /**
     * @Route("/logoff")
     */
    public function logoff()
    {
        $provider = $this->getTwitterProvider();
        $provider->logoff();

        $this->redirect('/');
    }

    /**
     * @return \PHPSC\Conference\Application\Service\TwitterAccessProvider
     */
    protected function getTwitterProvider()
    {
        return $this->get('twitter.provider');
    }

    /**
     * @return \PHPSC\Conference\Application\Service\AuthenticationService
     */
    protected function getAuthenticationService()
    {
        return $this->get('authentication.service');
    }
}