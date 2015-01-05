<?php

return array(
    'router' => array(
        'routes' => array(
            'zfcuser' => array(
                'child_routes' => array(
                    'profile' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/profile',
                            'defaults' => array(
                                'controller' => 'zfcuserprofile',
                                'action'     => 'profile',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'zfcuser_module_options'      => 'ZfcUserProfile\Factory\ModuleOptionsFactory',
        )
    ),
    'controllers' => array(
        'factories' => array(
            'zfcuserprofile' => 'ZfcUserProfile\Factory\Controller\UserProfileControllerFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);