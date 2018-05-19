<?php

namespace Admin;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'admin' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/admin',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'do' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'admin/layout'      => __DIR__ . '/../view/layout/admin.phtml',
            'admin/index/index' => __DIR__ . '/../view/admin/index/index.phtml',
            'error/404'         => __DIR__ . '/../view/error/404.phtml',
            'error/index'       => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    // The following registers our custom view
    // helper classes in view plugin manager.
    'view_helpers' => [
        'factories' => [
            View\Helper\Menu::class => InvokableFactory::class,
            View\Helper\VerticalMenu::class => InvokableFactory::class,
            View\Helper\Breadcrumbs::class => InvokableFactory::class,
        ],
        'aliases' => [
            'mainMenu' => View\Helper\Menu::class,
            'verticalMenu' => View\Helper\VerticalMenu::class,
            'pageBreadcrumbs' => View\Helper\Breadcrumbs::class,
        ],
    ],
    'menuItems' =>[
        'top' => [
            [
                'id' => 'setting',
                'label' => 'Setting',
                'icon' => 'glyphicon-chevron-down',
                'target' => 'userMenu',
                'expanded' => 'in',
                'dropdown' => [
                    [
                        'id' => 'home',
                        'label' => 'Home',
                        'icon' => 'glyphicon-home',
                        'link' => '#'
                    ],
                    [
                        'id' => 'messages',
                        'label' => 'Messages',
                        'icon' => 'glyphicon-envelope',
                        'extra' => '<span class="badge badge-info">4</span>', // meeds to be a service.
                        'link' => '#'
                    ],
                    [
                        'id' => 'options',
                        'label' => 'Options',
                        'icon' => 'glyphicon-cog',
                        'link' => '#'
                    ],
                    [
                        'id' => 'shoutbox',
                        'label' => 'Shoutbox',
                        'icon' => 'glyphicon-comment',
                        'link' => '#'
                    ],
                    [
                        'id' => 'staff-list',
                        'label' => 'Staff List',
                        'icon' => 'glyphicon-user',
                        'link' => '#'
                    ],
                    [
                        'id' => 'transactions',
                        'label' => 'Transactions',
                        'icon' => 'glyphicon-flag',
                        'link' => '#'
                    ],
                    [
                        'id' => 'rules',
                        'label' => 'Rules',
                        'icon' => 'glyphicon-exclamation-sign',
                        'link' => '#'
                    ],
                    [
                        'id' => 'logout',
                        'label' => 'Logout',
                        'icon' => 'glyphicon-off',
                        'link' => '#'
                    ],
                ],
            ],
            [
                'id' => 'reports',
                'label' => 'Reports',
                'icon' => 'glyphicon-chevron-right',
                'target' => 'menu2',
                'dropdown' => [
                    [
                        'id' => 'information-tats',
                        'label' => 'Information &amp; Stats',
                        'link' => '#'
                    ],
                    [
                        'id' => 'views',
                        'label' => 'Views',
                        'link' => '#'
                    ],
                    [
                        'id' => 'requests',
                        'label' => 'Requests',
                        'link' => '#'
                    ],
                    [
                        'id' => 'Timetable',
                        'label' => 'timetable',
                        'link' => '#'
                    ],
                    [
                        'id' => 'alerts',
                        'label' => 'Alerts',
                        'link' => '#'
                    ],
                ],
            ],
            [
                'id' => 'social-media',
                'label' => 'Social Media',
                'icon' => 'glyphicon-chevron-right',
                'target' => 'menu3',
                'dropdown' => [
                    [
                        'id' => 'facebook',
                        'label' => 'Facebook',
                        'icon' => 'glyphicon-circle',
                        'link' => '#'
                    ],
                    [
                        'id' => 'twitter',
                        'label' => 'Twitter',
                        'icon' => 'glyphicon-circle',
                        'link' => '#'
                    ],
                ]
            ],
        ],
    ],
];
