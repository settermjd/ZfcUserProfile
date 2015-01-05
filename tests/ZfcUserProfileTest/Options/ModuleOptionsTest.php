<?php
namespace ZfcUserProfile\tests\ZfcUserProfileTest\Options;

use ZfcUserTest\Options\ModuleOptionsTest as OptionsTest;
use ZfcUserProfile\Options\ModuleOptions as Options;

class ModuleOptionsTest extends OptionsTest
{
    public function setUp()
    {
        $options = new Options;
        $this->options = $options;
    }

    /**
     * @covers ZfcUser\Options\ModuleOptions::getEnableUserProfile
     * @covers ZfcUser\Options\ModuleOptions::setEnableUserProfile
     */
    public function testSetGetEnableUserProfile()
    {
        $this->options->setEnableUserProfile(false);
        $this->assertFalse($this->options->getEnableUserProfile());
    }

    /**
     * @covers ZfcUser\Options\ModuleOptions::getEnableUserProfile
     */
    public function testGetEnableUserProfile()
    {
        $this->assertTrue($this->options->getEnableUserProfile());
    }
}
