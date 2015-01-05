<?php
namespace ZfcUserProfile\Factory\Controller;

use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserProfile\Controller\UserProfileController;

class UserProfileControllerFactory implements FactoryInterface
{
    /**
     * Create controller
     *
     * @param ControllerManager $serviceLocator
     * @return UserController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        /* @var ServiceLocatorInterface $serviceLocator */
        $serviceLocator = $controllerManager->getServiceLocator();

        $userService = $serviceLocator->get('zfcuser_user_service');
        $registerForm = $serviceLocator->get('zfcuser_register_form');
        $loginForm = $serviceLocator->get('zfcuser_login_form');
        $options = $serviceLocator->get('zfcuser_module_options');

        $controller = new UserProfileController($userService, $options, $registerForm, $loginForm);

        return $controller;
    }
}
