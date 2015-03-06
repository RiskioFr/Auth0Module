<?php
namespace Riskio\Auth0Module\Controller;

use Riskio\Auth0Module\Service\Auth0Service;
use Zend\Mvc\Controller\AbstractActionController;

class Auth0Controller extends AbstractActionController
{
    /**
     * @var Auth0Service
     */
    protected $auth0Service;

    /**
     * @param Auth0Service $auth0Service
     */
    public function __construct(Auth0Service $auth0Service)
    {
        $this->auth0Service = $auth0Service;
    }

    public function callbackAction()
    {
        $auth0User = $this->auth0Service->getUser();
        if (!$auth0User) {
            return $this->redirect()->toRoute('zfcuser/login');
        }

        return $this->redirect()->toRoute('app');
    }
}
