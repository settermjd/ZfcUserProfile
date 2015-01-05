<?php
namespace ZfcUserProfile\tests\ZfcUserProfileTest\Controller;

use ZfcUserTest\Controller\UserControllerTest;
use ZfcUser\Controller\UserController as Controller;

class UserProfileControllerTest extends UserControllerTest
{
    public function setUp()
    {
        $this->userService = $this->getMock('ZfcUser\Service\User');

        $this->options = $this->getMock('ZfcUser\Options\ModuleOptions');

        $this->registerForm = $this->getMockBuilder('ZfcUser\Form\Register')
            ->disableOriginalConstructor()
            ->getMock();

        $this->loginForm = $this->getMockBuilder('ZfcUser\Form\Login')
            ->disableOriginalConstructor()
            ->getMock();

        $controller = new Controller($this->userService, $this->options, $this->registerForm, $this->loginForm);
        $this->controller = $controller;

        $this->zfcUserAuthenticationPlugin = $this->getMock('ZfcUser\Controller\Plugin\ZfcUserAuthentication');

        $pluginManager = $this->getMock('Zend\Mvc\Controller\PluginManager', array('get'));

        $pluginManager->expects($this->any())
            ->method('get')
            ->will($this->returnCallback(array($this, 'helperMockCallbackPluginManagerGet')));

        $this->pluginManager = $pluginManager;

        $controller->setPluginManager($pluginManager);
    }

    /**
     * @depend testActionControllHasIdentity
     */
    public function testProfileActionLoggedIn()
    {
        $this->setUpZfcUserAuthenticationPlugin(array(
            'hasIdentity'=>true
        ));

        $this->options->expects($this->any())
            ->method('getEnableUserProfile')
            ->will($this->returnValue(true));

        $result = $this->controller->profileAction();

        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
        $this->assertEquals(
            $this->options->getEnableUserProfile(),
            $result->getVariable('enableUserProfile')
        );
    }
}
