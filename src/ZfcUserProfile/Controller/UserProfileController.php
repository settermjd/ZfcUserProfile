<?php
namespace ZfcUserProfile\Controller;

use ZfcUser\Controller\UserController as ZfcUserController;
use Zend\View\Model\ViewModel;

class UserProfileController extends ZfcUserController
{
    /**
     * User Profile page
     */
    public function profileAction()
    {
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute(static::ROUTE_LOGIN);
        }
        return new ViewModel(array(
            'enableUserProfile' => $this->options->getEnableUserProfile()
        ));
    }
}