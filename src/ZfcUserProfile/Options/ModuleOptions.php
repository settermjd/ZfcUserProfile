<?php
namespace ZfcUserProfile\Options;

use ZfcUser\Options\ModuleOptions as ZfcModuleOptions;

class ModuleOptions extends ZfcModuleOptions
{
    /**
     * @var bool
     */
    protected $enableUserProfile = true;

    /**
     * set enable user profile
     *
     * @param bool $enableUserProfile
     * @return ModuleOptions
     */
    public function setEnableUserProfile($enableUserProfile)
    {
        $this->enableUserProfile = $enableUserProfile;
        return $this;
    }

    /**
     * get enable user profile
     *
     * @return bool
     */
    public function getEnableUserProfile()
    {
        return $this->enableUserProfile;
    }
}
