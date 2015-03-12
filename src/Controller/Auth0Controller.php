<?php
namespace Riskio\Auth0Module\Controller;

use Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;

class Auth0Controller extends AbstractActionController
{
    /**
     * @var AuthenticationService
     */
    protected $authService;

    /**
     * @var Auth0Adapter
     */
    protected $authAdapter;

    /**
     * @param AuthenticationService $authService
     * @param Auth0Adapter $authAdapter
     */
    public function __construct(AuthenticationService $authService, Auth0Adapter $authAdapter)
    {
        $this->authService = $authService;
        $this->authAdapter = $authAdapter;
    }

    public function callbackAction()
    {
        $code = $this->request->getQuery('code', null);
        if (null === $code) {
            return $this->redirect()->toRoute('user/login');
        }

        $this->authAdapter->setCode($code);

        $auth = $this->authService->authenticate($this->authAdapter);
        if (!$auth->isValid()) {
            return $this->redirect()->toRoute('user/login');
        }

        return $this->redirect()->toRoute('app');
    }
}
